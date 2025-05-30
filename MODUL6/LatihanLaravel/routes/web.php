<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController; // Tugas latihan 5

Route::get('/', function () {
    return view('welcome');
});

Route::get('/latihan-berhasil', function () {
    return view('latihan_view', ['pesan_dari_route' => 'Latihan Laravel 11 Berhasil!']);
});

Route::get('/hello', [HelloController::class, 'index']); // Rute HelloController
