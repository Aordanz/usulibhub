<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/layanan-luring', function () {
    return view('layanan.luring');
})->name('layanan.luring');

Route::get('/layanan-daring', function () {
    return view('layanan.daring');
})->name('layanan.daring');

Route::get('/layanan-area-belajar', function () {
    return view('layanan.area-belajar');
})->name('layanan.area-belajar');

Route::get('/jadwal-ruangan', function () {
    return view('jadwal-ruangan');
})->name('jadwal.ruangan');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
