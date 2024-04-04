<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin
$routes->get('/', 'Admin::index');

// Student
$routes->get('/student/attendance', 'Student::index');

// API
$routes->get('/check_connection', 'API::check_connection');
$routes->post('/login', 'API::login');
$routes->get('/logout', 'API::logout');