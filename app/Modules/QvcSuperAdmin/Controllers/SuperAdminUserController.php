<?php

namespace App\Modules\QvcSuperAdmin\Controllers;

use App\Controllers\BaseController;
use App\Models\QvcAdminModel;

class SuperAdminUserController extends BaseController
{
    protected $qvcAdminModel;

    public function __construct()
    {
        $this->session = service('session');
        $this->qvcAdminModel        =   new QvcAdminModel();
    }

    // View All Admin List Page
    public function adminList()
    {
        // Fetch all from table qvc_admin
        $admin_list =  $this->qvcAdminModel->findAll();

        $data = [
            'admin_list'    =>  $admin_list
        ];
        $this->render_super_admin('user/AdminList', $data);
    }
}
