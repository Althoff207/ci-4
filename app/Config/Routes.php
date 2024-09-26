<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/action', 'Login::loginAction');
$routes->get('/logout', 'Login::logout');
//after login
//admin routes
$routes->get('/admin', 'Admin::index', ['filter' => 'adminfilter']);

//user routes
$routes->get('/user', 'User::index', ['filter' => 'userfilter']);
$routes->get('/user/catalog', 'User::catalog', ['filter' => 'userfilter']);