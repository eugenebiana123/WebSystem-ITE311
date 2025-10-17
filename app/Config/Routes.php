<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

$routes->get('/register', 'Auth::regform');
$routes->get('/login', 'Auth::logForm');
$routes->post('/login/auth', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->post('/register', 'Auth::createAcc');
$routes->get('/register/success', 'Auth::success');
$routes->get('/announcements', 'Announcement::index');


$routes->setAutoRoute(true);