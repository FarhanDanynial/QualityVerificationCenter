<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\SamcModel;
use App\Models\AssessorModel;
use App\Models\ProviderModel;
use App\Models\SamcPaymentModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\SamcPaymentItemModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;

class QvcAdminInvoiceController extends BaseController
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

    public function invoiceManagement()
    {
        // Fetch Invoice Payment details or FPX Payment details
        $invoice_info = $this->samc_payment
            ->whereIn('sp_status', ['PENDING_CHECK', 'PAID'])
            ->findAll();

        $data = [
            'invoice_info' => $invoice_info
        ];

        $this->render_provider('invoice/manage_invoice', $data);
    }
}
