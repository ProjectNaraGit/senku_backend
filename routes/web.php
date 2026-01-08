<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cara_order', [PageController::class, 'cara_order'])->name('cara_order');
Route::get('/testimoni', [PageController::class, 'testimoni'])->name('testimoni');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');


Route::get('/mahasiswa/login', function () {
    return view('auth.login-mahasiswa');
})->name('mahasiswa.login');
Route::get('/siswa/login', function () {
    return view('auth.login-siswa');
})->name('siswa.login');
Route::get('/umum/login', function () {
    return view('auth.login-umum');
})->name('umum.login');

Route::get('/mahasiswa/signup', function () {
    return view('auth.daftar-mahasiswa');
})->name('mahasiswa.signup');
Route::get('/siswa/signup', function () {
    return view('auth.daftar-siswa');
})->name('siswa.signup');
Route::get('/umum/signup', function () {
    return view('auth.daftar-umum');
})->name('umum.signup');

Route::get('/password/forget', function () {
    return view('auth.lupa password');
})->name('password.forget');
Route::get('/password/new-password', function () {
    return view('auth.lupa password-new pass');
})->name('password.new');
Route::get('/password/check-email', function () {
    return view('auth.lupa password-check email');
})->name('password.check-email');

// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route lupa password
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route dashboard berdasarkan tipe user (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('dashboard.mahasiswa');
    })->name('mahasiswa.dashboard')->middleware('check.user.type:mahasiswa');
    
    Route::get('/siswa/dashboard', function () {
        return view('dashboard.siswa');
    })->name('siswa.dashboard')->middleware('check.user.type:siswa');
    
    Route::get('/umum/dashboard', function () {
        return view('dashboard.umum');
    })->name('umum.dashboard')->middleware('check.user.type:umum');
});