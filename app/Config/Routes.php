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
$routes->post('/register', 'API::register');
$routes->post('/student/login', 'API::student_login');
$routes->post('/update_student_location', 'API::update_student_location');

// Errors
$routes->get('/browser_error', 'Errors::index');

// Logout
$routes->get('/logout', 'API::logout');