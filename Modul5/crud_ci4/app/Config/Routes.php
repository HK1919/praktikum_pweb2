<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/create', 'MahasiswaController::create');
$routes->post('/mahasiswa/store', 'MahasiswaController::store');
$routes->get('/mahasiswa/edit/(:num)', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'MahasiswaController::update/$1'); // Menggunakan POST untuk updates
$routes->post('mahasiswa/delete/(:num)', 'MahasiswaController::delete/$1');

// Routes Alumni
// Rute untuk Alumni
$routes->get('/alumni', 'AlumniController::index');
$routes->get('/alumni/create', 'AlumniController::create');
$routes->post('/alumni/store', 'AlumniController::store');
$routes->get('/alumni/edit/(:num)', 'AlumniController::edit/$1');
$routes->post('/alumni/update/(:num)', 'AlumniController::update/$1');
$routes->get('/alumni/delete/(:num)', 'AlumniController::delete/$1');
