<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login
$routes->get('/', 'Auth::login');

// Student
$routes->get('/student/attendance', 'Student::index');

// API
$routes->get('/check_connection', 'API::check_connection');
// API
$routes->post('/register', 'API::register');

// Errors
$routes->get('/browser_error', 'Errors::index');