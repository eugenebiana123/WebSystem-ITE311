<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home pages
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

// Auth routes
$routes->match(['get', 'post'], '/login', 'Auth::login');
$routes->match(['get', 'post'], '/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');

// Role-specific dashboards
$routes->get('/admin/dashboard', 'Auth::adminDashboard');
$routes->get('/instructor/dashboard', 'Auth::instructorDashboard');
$routes->get('/student/dashboard', 'Auth::studentDashboard');
