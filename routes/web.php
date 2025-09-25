<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    return view('profile');
});

Route::get('/', function () {
    return view('berita');
});


Route::get('/', function () {
    return "Halaman Home";
});

Route::get('/profile', function () {
    return "Halaman Profile";
});

Route::get('/berita', function () {
    return "Halaman Berita";
});

Route::get('/kontak', function () {
    return "Halaman Kontak";
});