<?php

namespace App\Modules\Provider\Controllers;

use Mpdf\Mpdf;
use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\SamcPaymentItemModel;
use App\Models\SamcPaymentModel;

class ProviderInvoiceController extends BaseController
{

    protected $notification_model;
    protected $provider_model;
    protected $samc_model;
    protected $samc_payment;
    protected $samc_payment_item;

    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->notification_model               = new NotificationModel();
        $this->samc_model                       = new SamcModel();
        $this->samc_payment                     = new SamcPaymentModel();
        $this->samc_payment_item                = new SamcPaymentItemModel();
    }

    public function processInvoicePayment()
    {
        $samc_pvd_id = $this->session->get('user_id');
        $json = $this->request->getJSON();

        if (!$json || empty($json->selectedItems) || !isset($json->totalAmount) || !is_numeric($json->totalAmount)) {
            return $this->response->setJSON(['message' => 'Invalid request data'])->setStatusCode(400);
        }

        // Store data in session
        $this->session->set('selected_items', $json->selectedItems);
        $this->session->set('total_amount', $json->totalAmount);

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Update each item
            foreach ($json->selectedItems as $item) {
                $this->samc_model->update($item->samc_id, [
                    'samc_status'         => 'PENDING_INVOICE_PAYMENT',
                    'samc_payment_status' => 'PROCESSING',
                ]);
            }

            $invoiceNumber = $this->generateInvoiceNumber();

            // Store payment record
            $payment_data = [
                'sp_pvd_id'         => $samc_pvd_id,
                'sp_invoice_number' => $invoiceNumber,
                'sp_amount'         => $json->totalAmount,
                'sp_method'         => 'INVOICE',
                'sp_status'         => 'unpaid',
                'sp_created_at'     => date('Y-m-d H:i:s'),
            ];

            $sp_id = $this->samc_payment->insert($payment_data);

            // Store payment items
            foreach ($json->selectedItems as $item) {
                $this->samc_payment_item->insert([
                    'spi_sp_id'       => $sp_id,
                    'spi_samc_id'     => $item->samc_id,
                    'spi_created_at'  => date('Y-m-d H:i:s'),
                ]);
            }

            // Store the sp_id (invoice ID) in session
            $this->session->set('sp_id', $sp_id);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return $this->response->setJSON(['message' => 'Transaction failed'])->setStatusCode(500);
            }

            return $this->response->setJSON([
                'message' => 'Payment details processed successfully',
                'invoice_number' => $invoiceNumber,
            ]);
        } catch (\Exception $e) {
            $db->transRollback();
            error_log("Payment processing failed: " . $e->getMessage());
            return $this->response->setJSON(['message' => 'Payment processing failed'])->setStatusCode(500);
        }
    }

    public function generateInvoice()
    {

        $samc_pvd_id    = $this->session->get('user_id');
        $invoice_id     = $this->session->get('sp_id');
        $selected_items = $this->session->get('selected_items');
        $total_amount   = $this->session->get('total_amount');

        $item_details = [];

        if (!empty($selected_items)) {
            foreach ($selected_items as $item) {
                // Fetch samc details based on samc_id
                $samc_detail = $this->samc_model->where('samc_id', $item->samc_id)->first();

                if ($samc_detail) {
                    // Add item detail to array
                    $item_details[] = [
                        'samc_id'   => $item->samc_id,
                        'amount'    => $item->amount,
                        'samc_name' => $samc_detail->samc_course_name, // adjust field name as needed
                    ];
                }
            }
        }

        // fetch provider details
        $pvd_details = $this->provider_model->select('pvd_name, pvd_email, pvd_phone, pvd_address')
            ->where('pvd_id', $samc_pvd_id)
            ->first();

        // fetch invoice details
        $invoice_details = $this->samc_payment
            ->where('sp_id', $invoice_id)
            ->first();

        // Prepare data for the view
        $data = [
            'item_details'      => $item_details,
            'total_amount'      => $total_amount,
            'pvd_details'       => $pvd_details,
            'invoice_details'   => $invoice_details,
        ];

        // dd($data);

        $this->render_provider('payment/samc_invoice', $data);
    }

    private function generateInvoiceNumber(): string
    {
        $systemCode = 'MYQVC';
        $universityCode = 'UPSI';
        $date = date('Ymd');
        $prefix = $systemCode . '-' . $universityCode . '-' . $date;

        $lastInvoice = $this->samc_payment
            ->where('sp_invoice_number LIKE', $prefix . '%')
            ->orderBy('sp_invoice_number', 'DESC')
            ->first();

        if ($lastInvoice) {
            $lastNumber = (int) substr($lastInvoice->sp_invoice_number, -4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return $prefix . '-' . $newNumber;
    }

    // Fetch Invoice Details
    public function fetchInvoiceDetails($invoice_id)
    {
        //invoice id in session
        $this->session->set('sp_invoice_id', $invoice_id);

        return redirect()->to('/provider/invoice/view_invoice');
    }

    public function viewInvoice()
    {
        $invoice_id = $this->session->get('sp_invoice_id');
        $pvd_id = session()->get('user_id');

        // Fetch User Details
        $user_details = $this->provider_model
            ->where('pvd_id', $pvd_id)
            ->first();

        $invoice_details = $this->samc_payment
            ->where('sp_invoice_number', $invoice_id)
            ->first();

        if ($invoice_details) {
            // Fetch SAMC for this invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id, spi_sp_id, spi_created_at, samc_course_name')
                ->join('qvc_upsi.samc', 'samc.samc_id = samc_payment_item.spi_samc_id')
                ->where('spi_sp_id', $invoice_details->sp_id)
                ->findAll();
        } else {
            return $this->response->setJSON(['message' => 'Invoice not found'])->setStatusCode(404);
        }

        $data = [
            'invoice_details' => $invoice_details,
            'samc_items'      => $samc_items,
            'pvd_details'    => $user_details,
        ];
        $this->render_provider('payment/samc_view_invoice', $data);
    }
    public function printInvoice($invoice_id)
    {

        $samc_pvd_id    = $this->session->get('user_id');
        // $selected_items = $this->session->get('selected_items');
        $total_amount   = $this->session->get('total_amount');

        $item_details = $this->samc_payment_item
            ->select('spi_samc_id, spi_sp_id, spi_created_at, samc_course_name')
            ->join('qvc_upsi.samc', 'samc.samc_id = samc_payment_item.spi_samc_id')
            ->where('spi_sp_id', $invoice_id)
            ->findAll();

        // fetch provider details
        $pvd_details = $this->provider_model->select('pvd_name, pvd_email, pvd_phone, pvd_address')
            ->where('pvd_id', $samc_pvd_id)
            ->first();

        // fetch invoice details
        $invoice_details = $this->samc_payment
            ->where('sp_id', $invoice_id)
            ->first();

        // Prepare data for the view
        $data = [
            'item_details'      => $item_details,
            'total_amount'      => $total_amount,
            'pvd_details'       => $pvd_details,
            'invoice_details'   => $invoice_details,
        ];

        // Load HTML View
        $html = view('Modules\Provider\Views\payment\samc_invoice_print', $data);

        // $this->render_provider('payment/samc_invoice_print', $data);
        // Load mPDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        // Output PDF
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="Samc_Proforma.pdf"')
            ->setBody($mpdf->Output('', 'S')); // 'S' returns PDF as a string
    }

    public function downloadInvoice($invoice_id)
    {

        $samc_pvd_id    = $this->session->get('user_id');
        // $invoice_id     = $this->session->get('sp_id');
        // $selected_items = $this->session->get('selected_items');
        $total_amount   = $this->session->get('total_amount');

        $item_details = $this->samc_payment_item
            ->select('spi_samc_id, spi_sp_id, spi_created_at, samc_course_name')
            ->join('qvc_upsi.samc', 'samc.samc_id = samc_payment_item.spi_samc_id')
            ->where('spi_sp_id', $invoice_id)
            ->findAll();

        // fetch provider details
        $pvd_details = $this->provider_model->select('pvd_name, pvd_email, pvd_phone, pvd_address')
            ->where('pvd_id', $samc_pvd_id)
            ->first();

        // fetch invoice details
        $invoice_details = $this->samc_payment
            ->where('sp_id', $invoice_id)
            ->first();

        // Prepare data for the view
        $data = [
            'item_details'      => $item_details,
            'total_amount'      => $total_amount,
            'pvd_details'       => $pvd_details,
            'invoice_details'   => $invoice_details,
        ];

        // Load HTML View
        $html = view('Modules\Provider\Views\payment\samc_invoice_print', $data);

        // $this->render_provider('payment/samc_invoice_print', $data);
        // Load mPDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        // Output PDF
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'attachment; filename="Samc_Proforma.pdf"')
            ->setBody($mpdf->Output('Samc_Invoice.pdf', 'S'));
    }

    public function submitInvoicePaymentProof()
    {

        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        // Get POST data
        $invoice_id        = $this->request->getPost('invoice_id');
        $payment_date      = $this->request->getPost('payment_date');
        $payment_reference = $this->request->getPost('payment_reference');
        $payment_notes     = $this->request->getPost('payment_notes');

        // Get uploaded file
        $payment_proof = $this->request->getFile('payment_proof');

        if ($payment_proof && $payment_proof->isValid() && !$payment_proof->hasMoved()) {
            // Capture original name (user uploaded)
            $originalFileName = $payment_proof->getClientName();

            // Generate a new unique name for storage
            $storedFileName = $payment_proof->getRandomName();
            $paymentPath = 'uploads/payment_proof/';
            // Define the upload path (use public path if you want to access it via URL)
            $uploadPath = FCPATH . $paymentPath;

            // Create folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Move file to destination
            $payment_proof->move($uploadPath, $storedFileName);

            // Store both names and full relative file path
            $storedFilePath = $paymentPath . $storedFileName;

            // fetch each samc id in invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id')
                ->where('spi_sp_id', $invoice_id)
                ->findAll();
            // Loop through each samc id and update status
            foreach ($samc_items as $item) {
                $this->samc_model->update($item->spi_samc_id, [
                    'samc_status'           => 'PENDING_CHECK',
                    'samc_payment_status'   => 'PENDING_CHECK',
                    'samc_updated_date'     => date('Y-m-d H:i:s'),
                ]);
            }
            // Save into database
            $this->samc_payment->update($invoice_id, [
                'sp_status'             => 'PENDING_CHECK',
                'sp_prove_filename'     => $originalFileName,    // original file name
                'sp_prove'              => $storedFilePath,      // relative or absolute path
                'sp_reff_num'           => $payment_reference,
                'sp_notes'              => $payment_notes,
                'sp_payment_date'       => $payment_date,
                'sp_updated_at'         => date('Y-m-d H:i:s'),
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Payment proof uploaded successfully.',
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to upload payment proof.',
        ]);
    }


    // Add this method to your Invoice controller

    public function deleteInvoice()
    {
        // Check if request is POST and AJAX
        if (!$this->request->getMethod() === 'post') {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid request method.'
                ]);
            }
            return redirect()->back()->with('error', 'Invalid request method.');
        }

        // Get invoice ID from POST data
        $invoice_id = $this->request->getPost('invoice_id');

        if (!$invoice_id) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invoice ID is required.'
                ]);
            }
            return redirect()->back()->with('error', 'Invoice ID is required.');
        }

        try {
            // Load your models (adjust model names according to your setup)

            // Get invoice details first to check if it exists and get status
            $invoice = $this->samc_payment->find($invoice_id);

            if (!$invoice) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Invoice not found.'
                    ]);
                }
                return redirect()->back()->with('error', 'Invoice not found.');
            }

            $allowedStatuses = ['unpaid', 'PAYMENT_PROOF_REJECTED'];

            if (!in_array($invoice->sp_status, $allowedStatuses)) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Only unpaid/rejected invoices can be deleted.'
                    ]);
                }
                return redirect()->back()->with('error', 'Only unpaid/rejected invoices can be deleted.');
            }


            // Optional: Check if current user owns this invoice (add your own logic here)
            if ($invoice->sp_pvd_id !== session()->get('user_id')) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'You do not have permission to delete this invoice.'
                    ]);
                }
                return redirect()->back()->with('error', 'You do not have permission to delete this invoice.');
            }

            // Fetch SAMC ID associated with this invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id')
                ->where('spi_sp_id', $invoice_id)
                ->findAll();

            if (empty($samc_items)) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'No SAMC items found for this invoice.'
                    ]);
                }
                return redirect()->back()->with('error', 'No SAMC items found for this invoice.');
            }

            foreach ($samc_items as $item) {
                // Check if the SAMC item exists
                $samc = $this->samc_model->find($item->spi_samc_id);
                if (!$samc) {
                    if ($this->request->isAJAX()) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'SAMC item not found.'
                        ]);
                    }
                    return redirect()->back()->with('error', 'SAMC item not found.');
                }

                $samc_status_update = $this->samc_model->where('samc_id', $item->spi_samc_id)
                    ->set(['samc_status' => 'PENDING_PAYMENT', 'samc_payment_status' => null])
                    ->update();

                if (!$samc_status_update) {
                    if ($this->request->isAJAX()) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'Failed to update SAMC status.'
                        ]);
                    }
                    return redirect()->back()->with('error', 'Failed to update SAMC status.');
                }
            }

            // Proceed to delete the invoice item
            $invoice_item_delete = $this->samc_payment_item->where('spi_sp_id', $invoice_id)->delete();

            if (!$invoice_item_delete) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to delete invoice items.'
                    ]);
                }
                return redirect()->back()->with('error', 'Failed to delete invoice items.');
            }

            $deleted_invoice = $this->samc_payment->delete($invoice_id);

            if (!$deleted_invoice) {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to delete invoice.'
                    ]);
                }
                return redirect()->back()->with('error', 'Failed to delete invoice.');
            }

            // Success response
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Invoice deleted successfully.'
                ]);
            }

            // Fallback for non-AJAX requests
            return redirect()->to(base_url('provider/payment'))
                ->with('success', 'Invoice deleted successfully.');
        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'Invoice deletion error: ' . $e->getMessage());

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'An error occurred while deleting the invoice.'
                ]);
            }

            return redirect()->back()->with('error', 'An error occurred while deleting the invoice.');
        }
    }

    // // Delete Payment Proof
    // public function deletePaymentProof()
    // {
    //     try {
    //         if ($this->request->isAJAX()) {
    //             $json = $this->request->getJSON(true);
    //             $invoiceId = $json['invoice_id'] ?? null;

    //             if (!$invoiceId) {
    //                 return $this->response->setJSON(['success' => false, 'message' => 'Invoice ID missing.']);
    //             }

    //             $invoice = $this->samc_payment->select('sp_prove')
    //                 ->where('sp_id', $invoiceId)
    //                 ->get()
    //                 ->getRow();


    //             if (!$invoice) {
    //                 return $this->response->setJSON(['success' => false, 'message' => 'Invoice not found.']);
    //             }

    //             $filePath = FCPATH . 'uploads/payment_proof/' . $invoice->sp_prove;

    //             // Update the DB
    //             $updated = $this->samc_payment->update($invoiceId, ['sp_prove' => null]);


    //             if (!$updated) {
    //                 log_message('error', 'Failed to update sp_prove for invoice ID: ' . $invoiceId);
    //                 return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Netha la.']);
    //             }

    //             log_message('debug', 'Deleting payment proof for invoice ID: ' . $invoice->sp_prove);

    //             // Delete the file
    //             if (file_exists($filePath) && is_file($filePath)) {
    //                 unlink($filePath);
    //             }

    //             return $this->response->setJSON(['success' => true]);
    //         }

    //         return $this->response->setStatusCode(405)->setJSON(['success' => false, 'message' => 'Method not allowed']);
    //     } catch (\Throwable $e) {
    //         log_message('error', 'Delete Payment Proof Error: ' . $e->getMessage());
    //         return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Internal Server Error.']);
    //     }
    // }

    public function deletePaymentProof()
    {
        try {
            if ($this->request->isAJAX()) {
                // Accept both raw JSON and form data fallback
                $post = $this->request->getPost(); // 🔥 This handles form data properly

                $invoiceId = $post['invoice_id'] ?? null;

                if (!$invoiceId) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Invoice ID missing.',
                        'csrfName' => csrf_token(),
                        'csrfHash' => csrf_hash()
                    ]);
                }

                $invoice = $this->samc_payment->select('sp_prove')
                    ->where('sp_id', $invoiceId)
                    ->get()
                    ->getRow();

                if (!$invoice) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Invoice not found.',
                        'csrfName' => csrf_token(),
                        'csrfHash' => csrf_hash()
                    ]);
                }

                $filePath = FCPATH . 'uploads/payment_proof/' . $invoice->sp_prove;

                // Update the DB
                $updated = $this->samc_payment->update($invoiceId, ['sp_prove' => null]);

                if (!$updated) {
                    log_message('error', 'Failed to update sp_prove for invoice ID: ' . $invoiceId);
                    return $this->response->setStatusCode(500)->setJSON([
                        'success' => false,
                        'message' => 'Failed to update database.',
                        'csrfName' => csrf_token(),
                        'csrfHash' => csrf_hash()
                    ]);
                }

                // Delete the file
                if ($invoice->sp_prove && file_exists($filePath) && is_file($filePath)) {
                    unlink($filePath);
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Payment proof deleted successfully.',
                    'csrfName' => csrf_token(),
                    'csrfHash' => csrf_hash()
                ]);
            }

            return $this->response->setStatusCode(405)->setJSON([
                'success' => false,
                'message' => 'Method not allowed.',
                'csrfName' => csrf_token(),
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Delete Payment Proof Error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Internal Server Error.',
                'csrfName' => csrf_token(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function submitInvoicePaymentProofUpdate()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        // Get POST data
        $invoice_id        = $this->request->getPost('invoice_id');
        $payment_date      = $this->request->getPost('payment_date');
        $payment_reference = $this->request->getPost('payment_reference');
        $payment_notes     = $this->request->getPost('payment_notes');

        // Get uploaded file
        $payment_proof = $this->request->getFile('payment_proof');

        if ($payment_proof && $payment_proof->isValid() && !$payment_proof->hasMoved()) {
            // Capture original name (user uploaded)
            $originalFileName = $payment_proof->getClientName();

            // Generate a new unique name for storage
            $storedFileName = $payment_proof->getRandomName();
            $paymentPath = 'uploads/payment_proof/';
            // Define the upload path (use public path if you want to access it via URL)
            $uploadPath = FCPATH . $paymentPath;

            // Create folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Move file to destination
            $payment_proof->move($uploadPath, $storedFileName);

            // Store both names and full relative file path
            $storedFilePath = $paymentPath . $storedFileName;

            // fetch each samc id in invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id')
                ->where('spi_sp_id', $invoice_id)
                ->findAll();
            // Loop through each samc id and update status
            foreach ($samc_items as $item) {
                $this->samc_model->update($item->spi_samc_id, [
                    'samc_status'           => 'PENDING_CHECK',
                    'samc_payment_status'   => 'PENDING_CHECK',
                    'samc_updated_date'     => date('Y-m-d H:i:s'),
                ]);
            }
            // Save into database
            $this->samc_payment->update($invoice_id, [
                'sp_status'             => 'PENDING_CHECK',
                'sp_prove_filename'     => $originalFileName,    // original file name
                'sp_prove'              => $storedFilePath,      // relative or absolute path
                'sp_reff_num'           => $payment_reference,
                'sp_notes'              => $payment_notes,
                'sp_payment_date'       => $payment_date,
                'sp_updated_at'         => date('Y-m-d H:i:s'),
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Payment proof uploaded successfully.',
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to upload payment proof.',
        ]);
    }

    // public function upload_proof()
    // {
    //     // Check if this is an AJAX request
    //     if (!$this->request->isAJAX()) {
    //         return redirect()->back()->with('error', 'Invalid request method');
    //     }

    //     // Validate the form input
    //     $rules = [
    //         'invoice_number' => 'required',
    //         'payment_date' => 'required|valid_date',
    //         'payment_reference' => 'required|min_length[3]|max_length[50]',
    //         'payment_proof' => [
    //             'uploaded[payment_proof]',
    //             'mime_in[payment_proof,image/jpg,image/jpeg,image/png,application/pdf]',
    //             'max_size[payment_proof,2048]', // 2MB max
    //         ],
    //         'payment_notes' => 'permit_empty|max_length[500]',
    //     ];

    //     $response = ['success' => false];

    //     if (!$this->validate($rules)) {
    //         // Validation failed
    //         $response['message'] = $this->validator->getErrors();
    //         return $this->response->setJSON($response);
    //     }

    //     // Get the form data
    //     $invoiceNumber = $this->request->getPost('invoice_number');
    //     $paymentDate = $this->request->getPost('payment_date');
    //     $paymentReference = $this->request->getPost('payment_reference');
    //     $paymentNotes = $this->request->getPost('payment_notes');

    //     // Get the uploaded file
    //     $file = $this->request->getFile('payment_proof');

    //     // Check if file is valid
    //     if (!$file->isValid() || $file->hasMoved()) {
    //         $response['message'] = 'There was a problem with the uploaded file';
    //         return $this->response->setJSON($response);
    //     }

    //     // Generate a new file name
    //     $newName = $invoiceNumber . '_' . date('Ymd') . '_' . $file->getRandomName();

    //     // Move the file to the uploads directory
    //     try {
    //         $file->move(ROOTPATH . 'public/uploads/payment_proofs', $newName);
    //     } catch (\Exception $e) {
    //         $response['message'] = 'Failed to save the file: ' . $e->getMessage();
    //         return $this->response->setJSON($response);
    //     }

    //     // Save the payment proof record to database
    //     $paymentModel = new \App\Models\PaymentProofModel(); // You'll need to create this model

    //     $paymentData = [
    //         'invoice_number' => $invoiceNumber,
    //         'payment_date' => $paymentDate,
    //         'reference_number' => $paymentReference,
    //         'file_path' => 'uploads/payment_proofs/' . $newName,
    //         'notes' => $paymentNotes,
    //         'uploaded_at' => date('Y-m-d H:i:s'),
    //         'uploaded_by' => session()->get('user_id') // Assuming you store user ID in session
    //     ];

    //     try {
    //         $paymentModel->insert($paymentData);

    //         // Update the invoice status if needed
    //         $invoiceModel = new \App\Models\InvoiceModel(); // Your existing invoice model
    //         $invoiceModel->where('sp_invoice_number', $invoiceNumber)
    //             ->set(['sp_status' => 'PAYMENT UPLOADED'])
    //             ->update();

    //         $response['success'] = true;
    //         $response['message'] = 'Payment proof uploaded successfully';
    //     } catch (\Exception $e) {
    //         $response['message'] = 'Database error: ' . $e->getMessage();
    //     }

    //     return $this->response->setJSON($response);
    // }
}
