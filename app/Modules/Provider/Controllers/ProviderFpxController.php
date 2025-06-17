<?php

namespace App\Modules\Provider\Controllers;

use Mpdf\Mpdf;
use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\SamcPaymentItemModel;
use App\Models\SamcPaymentModel;

class ProviderFpxController extends BaseController
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

    // Fetch Invoice Details
    public function fetchFpxReceiptDetails($invoice_id)
    {
        //invoice id in session
        $this->session->set('sp_invoice_id', $invoice_id);

        return redirect()->to('/provider/fpx/view_receipt');
    }

    public function viewReceipt()
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
        $this->render_provider('payment/samc_fpx_receipt', $data);
    }
    public function printInvoice()
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

    public function downloadInvoice()
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
}
