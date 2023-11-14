<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penjumlahan', function () {
    return view('penjumlahan');
});

Route::get('/pengurangan', function () {
    return view('pengurangan');
});

Route::get('/tantangan', function () {
    return view('tantangan');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/review', function () {
    return view('review');
});
