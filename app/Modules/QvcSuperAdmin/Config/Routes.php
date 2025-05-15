<?php

use App\Modules\QvcSuperAdmin\Controllers\QvcSuperAdminController;
use App\Modules\QvcSuperAdmin\Controllers\SuperAdminUserController;

//Portfolio Route Groups
$routes->group('qvcSuperAdmin', function ($routes) {

    // Super Admin Users Management
    $routes->group('user', function ($routes) {
        $routes->get('admin-list',                   [SuperAdminUserController::class,     'adminList']);
    });

    $routes->get('dashboard',                   [QvcSuperAdminController::class,     'dashboard']);
    // Qvc Admin
    $routes->get('samc_monitoring',                   [QvcSuperAdminController::class,     'samc_monitoring']);
});
