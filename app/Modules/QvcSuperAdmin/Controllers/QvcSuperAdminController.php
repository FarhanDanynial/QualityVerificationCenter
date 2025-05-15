<?php

namespace App\Modules\QvcSuperAdmin\Controllers;

use App\Controllers\BaseController;

class QvcSuperAdminController extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
    }

    public function dashboard()
    {
        $data = [];
        $this->render_super_admin('dashboard', $data);
    }

    public function samc_monitoring()
    {
        $data = [];
        $this->render_super_admin('samc\monitoring', $data);
    }
}
