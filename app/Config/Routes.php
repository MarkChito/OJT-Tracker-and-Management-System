<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login
$routes->get('/', 'Auth::student_login');
$routes->get('/login/admin', 'Auth::admin_login');

// Admin
$routes->get('/admin/records', 'Admin::records');

// Student
$routes->get('/student/attendance', 'Student::attendance');
$routes->get('/student/attendance_records', 'Student::attendance_records');

// API
$routes->get('/check_connection', 'API::check_connection');
$routes->post('/register', 'API::register');
$routes->post('/student/login', 'API::student_login');
$routes->post('/admin/login', 'API::admin_login');
$routes->post('/update_student_location', 'API::update_student_location');
$routes->post('/time_in', 'API::time_in');
$routes->post('/time_out', 'API::time_out');

// Errors
$routes->get('/browser_error', 'Errors::index');

// Logout
$routes->get('/logout', 'API::logout');