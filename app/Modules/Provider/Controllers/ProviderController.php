<?php

namespace App\Modules\Provider\Controllers;

use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\AssessorExpertiseFieldModel;

class ProviderController extends BaseController
{

    protected $notification_model;
    protected $provider_model;
    protected $samc_model;
    protected $assessor_expertise_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->notification_model               = new NotificationModel();
        $this->assessor_expertise_model         = new AssessorExpertiseFieldModel();
        $this->samc_model                       = new SamcModel();
    }

    public function dashboard()
    {
        $pvd_id = session()->get('user_id');

        // Fecth user data
        $provider_info = $this->provider_model->where('pvd_id', $pvd_id)->first();

        // Provider Samc Information
        $pvd_samc = $this->samc_model
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = samc.samc_ef_id', 'left')
            ->where('samc_pvd_id', $pvd_id)
            ->findAll();

        // Fetch Notifications Data
        $notification = $this->notification_model
            ->where('n_user_type', 'provider')  // Filter by user type
            ->where('n_user_id', $pvd_id)  // Filter by user type
            ->orderBy('n_is_read', 'ASC')    // Order by unread (false) notifications first
            ->orderBy('n_created_at', 'DESC')  // Then order by creation date (latest first)
            ->findAll();

        // Count Unread Notifications
        $unread_notifications = $this->notification_model
            ->where('n_is_read', 'f')
            ->where('n_user_id', $pvd_id)  // Filter by user type
            ->where('n_user_type', 'provider')
            ->countAllResults();
        $samc_field = $this->assessor_expertise_model
            ->select('DISTINCT ON (aef_ef_id) aef_ef_id, ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->orderBy('aef_ef_id, ef_desc') // Ensures consistent selection
            ->findAll();

        // Get provider details from the session
        $data = [
            'provider_info'             => $provider_info,
            'notifications'             => $notification,
            'unread_notifications'      => $unread_notifications,
            'pvd_samc'                  => $pvd_samc,
            'samc_field'                => $samc_field
        ];

        $this->render_provider('dashboard', $data);
    }
    public function courses()
    {
        $data = [];
        $this->render_provider('courses/offered_courses', $data);
    }

    public function active_samc()
    {
        $data = [];
        $this->render_provider('samc/my_samc', $data);
    }
}
