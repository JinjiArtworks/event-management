<?php

use CodeIgniter\Router\RouteCollection;
use Myth\Auth\Config\Auth as AuthConfig;
/**
 * @var RouteCollection $routes
 */
// $routes->get('/create-db', function () {
//     $forge = \Config\Database::forge();
//     if ($forge->createDatabase('events')) {
//         echo 'Database created successfully';
//     }
// });
$routes->setAutoRoute(true);
$routes->get('/home', 'HomeController::index');
// $routes->get('/', 'HomeController::index');

$routes->get('gawe', 'Gawe::index');
$routes->get('gawe/add', 'Gawe::create');
$routes->post('gawe', 'Gawe::store');
$routes->get('gawe/edit/(:any)', 'Gawe::edit/$1');
$routes->put('gawe/(:any)', 'Gawe::update/$1');
$routes->delete('delete/(:num)', 'Gawe::delete/$1');

// groups controller 
$routes->get('groups/trash', 'Groups::trash');
$routes->get('groups/restore/(:any)', 'Groups::restore/$1');
$routes->get('groups/restore', 'Groups::restore'); // untuk restore semua sekalian
$routes->delete('groups/delete_perm/(:num)', 'Groups::delete_perm/$1');
$routes->delete('groups/delete_perm', 'Groups::delete_perm');
$routes->presenter('groups'); // routes presenter harus dibawah routes customnya.
// Untuk presenter dan menggunakan RESTful dari reseources controller
// , nama controller usahakan sama dengan nama routes, dan nama folder sesuaikan sama nama function pada controller ?!


// Gunakan resources routes
$routes->resource('contacts');  // sesuaikan dengan nama controllernya.


/** @var RouteCollection $routes */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(AuthConfig::class);
    $reservedRoutes = $config->reservedRoutes;
    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});
