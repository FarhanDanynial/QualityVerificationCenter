<?php

use App\Modules\Auth\Controllers\RegisterController;
use App\Modules\Auth\Controllers\LoginMPQUAController;

//Portfolio Route Groups
$routes->group('auth', function ($routes) {
    $routes->get('/',                           [LoginMPQUAController::class,     'sign_in_MPQUA']);
    $routes->post('attempt_login_MPQUA',        [LoginMPQUAController::class, 'attempt_login_MPQUA']);
});




