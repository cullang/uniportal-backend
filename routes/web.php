<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/jadwal-kuliah', function () {
    return view('jadwal');
})->name('jadwal');

Route::get('/deadline-tugas', function () {
    return view('deadline');
})->name('deadline');

Route::get('/kalender-pribadi', function () {
    return view('kalender');
})->name('kalender');

Route::get('/info-kuliah', function () {
    return view('informasi');
})->name('informasi');

Route::get('/catatan-mahasiswa', function () {
    return view('catatan');
})->name('catatan');

Route::get('/profil-mahasiswa', function () {
    return view('settings');
})->name('settings');