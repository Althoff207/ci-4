<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/action', 'Login::loginAction');
$routes->get('/logout', 'Login::logout');

// after login

// admin routes
$routes->get('/admin', 'Admin\BeritaController::index', ['filter' => 'adminfilter']); // Mengarahkan ke index berita
$routes->get('/admin/berita/create', 'Admin\BeritaController::create', ['filter' => 'adminfilter']);
$routes->post('/admin/berita/store', 'Admin\BeritaController::store', ['filter' => 'adminfilter']);
$routes->get('/admin/berita/edit/(:num)', 'Admin\BeritaController::edit/$1', ['filter' => 'adminfilter']);
$routes->post('/admin/berita/update/(:num)', 'Admin\BeritaController::update/$1', ['filter' => 'adminfilter']);
$routes->get('/admin/berita/delete/(:num)', 'Admin\BeritaController::delete/$1', ['filter' => 'adminfilter']);

// user routes
$routes->get('/user', 'User::index', ['filter' => 'userfilter']);
$routes->get('/user/catalog', 'User::catalog', ['filter' => 'userfilter']);
