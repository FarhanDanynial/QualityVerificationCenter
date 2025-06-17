<?php

use App\Modules\Provider\Controllers\ProviderController;
use App\Modules\Provider\Controllers\ProviderFpxController;
use App\Modules\Provider\Controllers\ProviderSamcController;
use App\Modules\Provider\Controllers\ProviderInvoiceController;
use App\Modules\Provider\Controllers\ProviderPaymentController;
use App\Modules\Provider\Controllers\ProviderProfileController;
use App\Modules\Provider\Controllers\ProviderReviewSamcController;
use App\Modules\Provider\Controllers\ProviderCertificateController;

//Portfolio Route Groups
$routes->group('provider', function ($routes) {

    // SAMC Route Groups ----------------------------------------------------------------------------------------------
    $routes->group('samc', function ($routes) {

        // SAMC Registration / Form
        $routes->post('save_form/(:any)',                       [ProviderSamcController::class,             'saveForm/$1']); // Handle form submission
        $routes->get('new_samc',                                [ProviderSamcController::class,             'newSamc']);
        $routes->get('samc_form_p1',                            [ProviderSamcController::class,             'samcFormP1']);
        $routes->get('samc_form_p2',                            [ProviderSamcController::class,             'samcFormP2']);
        $routes->get('samc_form_p3',                            [ProviderSamcController::class,             'samcFormP3']);
        $routes->get('samc_form_p4',                            [ProviderSamcController::class,             'samcFormP4']);
        $routes->get('samc_form_p5',                            [ProviderSamcController::class,             'samcFormP5']);
        $routes->post('save_as_draft_form',                     [ProviderSamcController::class,             'saveAsDraftForm']); // Handle form submission
        $routes->get('edit_samc_form/(:any)',                   [ProviderSamcController::class,             'editSamcForm/$1']);
        $routes->post('samc_prev_form/(:any)',                  [ProviderSamcController::class,             'samcPrevForm/$1']); // Handle form submission
        $routes->get('print_samc',                              [ProviderSamcController::class,             'printSamc']);
        $routes->put('submit_samc_form',                        [ProviderSamcController::class,             'submitSamcForm']);
        $routes->put('resubmit_samc_form',                      [ProviderSamcController::class,             'resubmitSamcForm']);

        // My SAMC
        $routes->get('my_samc',                                 [ProviderSamcController::class,             'mySamc']);

        // SAMC Simple View        
        $routes->get('view_samc/(:num)',                        [ProviderSamcController::class,             'viewSamc/$1']);
        $routes->get('samc_simple_view',                        [ProviderSamcController::class,             'samcSimpleView']);
    });

    // Review SAMC Route Groups ----------------------------------------------------------------------------------------------
    $routes->group('review_samc', function ($routes) {

        $routes->get('get_samc_review_result/(:num)',          [ProviderReviewSamcController::class,             'getSamcReviewResult/$1']);
        $routes->get('samc_review_details',                    [ProviderReviewSamcController::class,             'samcReviewDetails']);
    });


    // Payment Route Groups ----------------------------------------------------------------------------------------------
    $routes->group('payment', function ($routes) {
        $routes->get('checkout',                                [ProviderPaymentController::class,          'checkout']);
        $routes->post('process_fpx_payment',                    [ProviderPaymentController::class,          'processFpxPayment']);
        $routes->post('process_debit_credit_payment',           [ProviderPaymentController::class,          'processDebitCreditPayment']);
        // $routes->post('submit_payment_proof',                [ProviderPaymentController::class,          'submitPaymentProof']);

        $routes->get('to_pay',                                  [ProviderPaymentController::class,          'toPay']);
        $routes->get('payment_history',                         [ProviderPaymentController::class,          'paymentHistory']);
    });

    // FPX Route Groups ----------------------------------------------------------------------------------------------
    $routes->group('fpx', function ($routes) {
        $routes->get('fetch_fpx_receipt_details/(:any)',        [ProviderFpxController::class,          'fetchFpxReceiptDetails/$1']);
        $routes->get('view_receipt',                            [ProviderFpxController::class,          'viewReceipt']);
    });

    // Invoice Route Groups ----------------------------------------------------------------------------------------------
    $routes->group('invoice', function ($routes) {
        $routes->post('process_invoice_payment',                [ProviderInvoiceController::class,          'processInvoicePayment']);

        // invoice
        $routes->get('generate_invoice',                        [ProviderInvoiceController::class,          'generateInvoice']);
        $routes->get('fetch_invoice_details/(:any)',            [ProviderInvoiceController::class,          'fetchInvoiceDetails/$1']);
        $routes->get('view_invoice',                            [ProviderInvoiceController::class,          'viewInvoice']);
        $routes->get('print_invoice/(:any)',                    [ProviderInvoiceController::class,          'printInvoice/$1']);
        $routes->get('download_invoice/(:any)',                 [ProviderInvoiceController::class,          'downloadInvoice/$1']);
        $routes->get('edit_invoice',                            [ProviderInvoiceController::class,          'editInvoice']);
        $routes->post('submit_invoice_payment_proof',           [ProviderInvoiceController::class,          'submitInvoicePaymentProof']);
        $routes->post('submit_invoice_payment_proof_update',    [ProviderInvoiceController::class,          'submitInvoicePaymentProofUpdate']);

        // Delete Invoice
        $routes->post('delete_invoice',                         [ProviderInvoiceController::class,          'deleteInvoice']);
        $routes->post('delete_payment_proof',                   [ProviderInvoiceController::class,          'deletePaymentProof']);
    });


    // $routes->get('courses',                                  [ProviderController::class,                 'courses']);
    // $routes->get('active_samc',                              [ProviderController::class,                 'active_samc']);
    // $routes->get('history',                                  [ProviderController::class,                 'history']);

    //Profile Route Groups ------------------------------------------------------------------------------------------------
    $routes->post('update_profile',                             [ProviderProfileController::class,          'updateProfile']); // Handle form submission

    $routes->get('dashboard',                                   [ProviderController::class,                 'dashboard']);

    //Profile Route Groups ------------------------------------------------------------------------------------------------
    $routes->get('profile',                                     [ProviderProfileController::class,          'profile']);

    // SAMC Route Groups ------------------------------------------------------------------------------------------------
    $routes->post('submitSamc',                                 [ProviderSamcController::class,             'submitSamc']); // Handle form submission
    $routes->post('saveSamcDraft',                              [ProviderSamcController::class,             'saveSamcDraft']); // Handle form submission
    $routes->post('updateSamcDraft',                            [ProviderSamcController::class,             'updateSamcDraft']); // Handle form submission
    $routes->post('submitSamcDraft',                            [ProviderSamcController::class,             'submitSamcDraft']); // Handle form submission

    // Fetch SAMC Details
    $routes->get('getSamcData/(:num)',                          [ProviderSamcController::class,             'getSamcData/$1']);
    $routes->get('samcDetails',                                 [ProviderSamcController::class,             'samcDetails']);



    // Fetch SAMC Details for update
    $routes->get('fetch-samc-data/(:num)',                      [ProviderSamcController::class,             'fetchSamcData/$1']);

    //Generate SAMC Certifacte
    $routes->get('generate_certificate',                        [ProviderCertificateController::class,     'generate_certificate']);

    // Delete SAMC
    $routes->post('delete_samc_proforma',                       [ProviderSamcController::class,             'delete_samc_proforma']);
    $routes->post('delete_samc_proofofpayment',                 [ProviderSamcController::class,             'delete_samc_proofofpayment']);
});
