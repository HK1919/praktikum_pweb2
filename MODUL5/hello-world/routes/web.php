<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/kawan/{nama}', function ($nama) {
    return 'Halo, ' . $nama . ' Selamat belajar Laravel 12';
});

Route::get('/nama/{nama}', [KawanController::class, 'show']);

Route::get('/biodata', [KawanController::class, 'getBiodata']);


