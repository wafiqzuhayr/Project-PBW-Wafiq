<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/about', function () {
    return view('about');
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

Route::get('/about', function () {
    return "Halaman About";
});