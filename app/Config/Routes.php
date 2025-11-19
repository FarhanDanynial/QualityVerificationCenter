<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to('/auth/appmpqua');
});

foreach (glob(APPPATH . 'Modules/*/Config/Routes.php') as $file) {
    require $file;
}
