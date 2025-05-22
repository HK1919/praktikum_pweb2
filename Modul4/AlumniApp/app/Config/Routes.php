<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('lat01', 'Latihan0301::index');
// $routes->get('salam', 'Latihan0302::formBiodata');  // Mengarah ke formBiodata
// $routes->post('salam/store', 'Latihan0302::store');  // Menyimpan data dari form dan menampilkan salam
// $routes->get('/alumni', 'Alumni::index');
// $routes->get('/alumni/create', 'Alumni::create');
// $routes->post('/alumni/store', 'Alumni::store');
// $routes->get('/alumni/edit/(:num)', 'Alumni::edit/$1');
// $routes->post('/alumni/update/(:num)', 'Alumni::update/$1');
// $routes->get('/alumni/delete/(:num)', 'Alumni::delete/$1');

// ... (kode rute lainnya)

$routes->get('/alumni', 'AlumniController::index'); // Rute menampilkan semua alumni [cite: 148]
$routes->get('/alumni/create', 'AlumniController::create'); // Rute menampilkan form tambah [cite: 149]
$routes->post('/alumni/store', 'AlumniController::store'); // Rute menyimpan data baru [cite: 149]
$routes->get('/alumni/edit/(:num)', 'AlumniController::edit/$1'); // Rute menampilkan form edit
$routes->put('/alumni/update/(:num)', 'AlumniController::update/$1'); // Rute untuk update data (menggunakan PUT)
$routes->delete('/alumni/delete/(:num)', 'AlumniController::delete/$1'); // Rute untuk hapus data (menggunakan DELETE)
