<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetaController;

Route::get('/', function () {
    $data = [
        'title' => 'Selamat Lebaran',
    ];
    return view('comingsoon', $data);
});

// Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// protected by auth middleware
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('peta-geografi', [PetaController::class, 'geografi'])->name('peta-geografi');
    Route::get('peta-keamanan', [PetaController::class, 'keamanan'])->name('peta-keamanan');
});

