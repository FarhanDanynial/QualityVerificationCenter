<?php

use App\Modules\QvcAdmin\Controllers\QvcAdminMPQUAController;

$routes->group('qvcAdmin', function ($routes) {

    $routes->group('mpqua', function ($routes) {
        $routes->get('list',                                [QvcAdminMPQUAController::class,      'list']);
        $routes->post('addUser',                            [QvcAdminMPQUAController::class,      'addUser']);
        $routes->get('getMPQ/(:num)',                       [QvcAdminMPQUAController::class,      'getMPQ/$1']);
        $routes->post('editUser',                           [QvcAdminMPQUAController::class,      'editUser']);
        $routes->post('deleteUser/(:num)',                  [QvcAdminMPQUAController::class,      'deleteUser/$1']);

        $routes->get('listNew',                             [QvcAdminMPQUAController::class,      'listNew']);
    });
});
