<?php

namespace App\Modules\Provider\Controllers;

use Mpdf\Mpdf;
use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\SamcPaymentItemModel;
use App\Models\SamcPaymentModel;

class ProviderPaymentController extends BaseController
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

    public function checkout()
    {
        $samc_pvd_id = $this->session->get('user_id');

        // Check if user id exist
        if ($samc_pvd_id) {

            $samc_data = $this->samc_model
                ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = samc.samc_ef_id', 'left')
                ->where('samc_pvd_id', $samc_pvd_id)
                ->where('samc_payment_status', null)
                ->where('samc_status', 'PENDING_PAYMENT')
                ->findAll();

            $data = [
                'samc_data' => $samc_data,
            ];

            $this->render_provider('payment/samc_payment', $data);
        }
        // If not exist redirect user to new samc form p1
        else {
            return redirect()->to('/');
        }
    }

    public function processFpxPayment()
    {
        $samc_pvd_id = $this->session->get('user_id');
        $json = $this->request->getJSON();

        if (!$json || empty($json->selectedItems)) {
            return $this->response->setJSON(['message' => 'No items selected'])->setStatusCode(400);
        }

        // Example: Store the selected items in the session or database
        foreach ($json->selectedItems as $item) {
            log_message('info', 'Processing payment for: ' . $item->samc_id . ', Amount: ' . $item->amount);
        }

        $payment_status = 'success';
        // Check payment status
        if ($payment_status == 'success') {

            // Update each samc paid status
            foreach ($json->selectedItems as $item) {
                $this->samc_model->update($item->samc_id, [
                    'samc_status'           => 'AWAITING_REVIEWER_ASSIGNMENT',
                    'samc_payment_status'   => 'PAID',
                ]);
            }

            $fpxRefNumber = $this->generateFPXRefNumber();

            // Store payment record in database
            $payment_data = [
                'sp_pvd_id'         => $samc_pvd_id,
                'sp_invoice_number' => $fpxRefNumber,
                'sp_amount'         => $json->totalAmount,
                'sp_method'         => 'FPX',
                'sp_payment_date'   => date('Y-m-d H:i:s'),
                'sp_status'         => 'PAID',
                'sp_created_at'     => date('Y-m-d H:i:s'), // Add current timestamp
            ];
            $sp_id = $this->samc_payment->insert($payment_data); // Get inserted ID
            log_message('info', 'SP ID is: ' . $sp_id);

            // Insert payment items
            foreach ($json->selectedItems as $item) {
                $this->samc_payment_item->insert([
                    'spi_sp_id'   => $sp_id,  // Use the retrieved payment ID
                    'spi_samc_id' => $item->samc_id,
                    'spi_created_at' => date('Y-m-d H:i:s'), // Add current timestamp
                ]);
            }
        }

        return $this->response->setJSON(['message' => 'Payment details processed successfully']);
    }

    private function generateFPXRefNumber(): string
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

    // public function processDebitCreditPayment()
    // {
    //     $json = $this->request->getJSON();

    //     if (!$json || empty($json->selectedItems)) {
    //         return $this->response->setJSON(['message' => 'No items selected'])->setStatusCode(400);
    //     }

    //     // Example: Store the selected items in the session or database
    //     foreach ($json->selectedItems as $item) {
    //         log_message('info', 'Processing payment for: ' . $item->samc_id . ', Amount: ' . $item->amount);
    //     }

    //     log_message('info', 'Total amount is: ' . $json->totalAmount);

    //     return $this->response->setJSON(['message' => 'Payment details processed successfully']);
    // }

    public function toPay()
    {
        $pvd_id = session()->get('user_id');

        $total_paid_samc = $this->samc_model
            ->where('samc_pvd_id', $pvd_id)
            ->where('samc_payment_status', 'PROCESSING')
            ->countAllResults();

        // Fetch Invoice Payment details or FPX Payment details
        $invoice_info = $this->samc_payment
            ->where('sp_pvd_id', $pvd_id)
            ->whereIn('sp_status', ['unpaid', 'PENDING_CHECK', 'PAYMENT_PROOF_REJECTED'])
            ->findAll();

        // Count total samc paid by Invoice and FPX
        $invoice_amount = 0;
        $fpx_amount = 0;
        foreach ($invoice_info ?? [] as $invoice) {
            if ($invoice->sp_method == 'FPX') {
                $fpx_amount += $invoice->sp_amount;
            } elseif ($invoice->sp_method == 'INVOICE') {
                $invoice_amount += $invoice->sp_amount;
            }
        }

        $data = [
            'invoice_info' => $invoice_info,
            'total_paid_samc' => $total_paid_samc,
            'invoice_amount' => $invoice_amount,
            'fpx_amount' => $fpx_amount,
        ];

        $this->render_provider('payment/samc_to_be_pay', $data);
    }

    // Payment History Page
    public function paymentHistory()
    {
        $pvd_id = session()->get('user_id');

        // Fetch all user samc that has been paid


        // Count total samc paid
        $total_paid_samc = $this->samc_model
            ->where('samc_pvd_id', $pvd_id)
            ->where('samc_payment_status', 'PAID')
            ->countAllResults();

        // Fetch Invoice Payment details or FPX Payment details
        $invoice_info = $this->samc_payment
            ->where('sp_pvd_id', $pvd_id)
            ->where('sp_status', 'PAID')
            ->findAll();

        // Count total samc paid by Invoice and FPX
        $invoice_amount = 0;
        $fpx_amount = 0;
        foreach ($invoice_info ?? [] as $invoice) {
            if ($invoice->sp_method == 'FPX') {
                $fpx_amount += $invoice->sp_amount;
            } elseif ($invoice->sp_method == 'INVOICE') {
                $invoice_amount += $invoice->sp_amount;
            }
        }


        $data = [
            'invoice_info' => $invoice_info,
            'total_paid_samc' => $total_paid_samc,
            'invoice_amount' => $invoice_amount,
            'fpx_amount' => $fpx_amount,
        ];

        $this->render_provider('payment/history', $data);
    }
}
