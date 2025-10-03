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
            "konten" => "Jakarta, 3 Oktober 2025 — Perkembangan teknologi kecerdasan buatan (AI) kian pesat. Salah satu startup teknologi asal Indonesia, Nusantara Tech, baru saja meluncurkan prototipe asisten virtual berbahasa Indonesia yang dirancang khusus untuk membantu kebutuhan masyarakat lokal.",
        ],
        [
            "judul" => "Berita 2",
            "penulis" => "Wapek love sasya",
            "konten" => "Berbeda dengan asisten digital global yang umumnya berfokus pada bahasa Inggris, produk ini didesain agar lebih mudah memahami konteks percakapan sehari-hari dalam bahasa Indonesia. Menurut CEO Nusantara Tech, asisten virtual ini mampu menjawab pertanyaan, memberikan rekomendasi, hingga membantu pekerjaan administratif seperti menjadwalkan rapat.",
        ],
        [
            "judul" => "Berita 3",
            "penulis" => "Wapek suka tobrut",
            "konten" => "Pengamat teknologi menilai langkah ini sebagai peluang besar bagi Indonesia untuk tidak hanya menjadi pengguna, tetapi juga produsen teknologi berbasis AI.",
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