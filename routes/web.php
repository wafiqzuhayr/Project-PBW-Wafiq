<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile",
        "nama" => "Wafiq",
        "nohp" => "08876656",
        "foto" => "img/ganjar.webp"
    ]);
});

Route::get('/berita', function () {
    $data_berita= [
        [
            "judul" => "Berita 1",
            "penulis" => "Saya",
            "konten" => "Info"
        ]
        ];

    return view('berita', [
        "title" => "Berita",
        "beritas" => $data_berita
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});
Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});