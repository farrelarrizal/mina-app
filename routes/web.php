<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LandingController;

// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('landing.index');
// })->name('landing.index');

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('about', function () {
    $package_category = DB::table('package_category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();

    $data = [
        'title' => 'About Us',
        'package_category' => $package_category,
    ];

    return view('landing.about', $data);
})->name('landing.about');

// Route::get('package', function () {
//     return view('landing.package');
// })->name('landing.package');

// Route::get('package/detail', function () {
//     return view('landing.package-detail');
// })->name('landing.package');

// Route::get('contact', function () {
//     return view('landing.contact');
// })->name('landing.contact');
Route::get('contact', [LandingController::class, 'contact'])->name('landing.contact');



// Route::get('post/{url}', function () {
//     return view('articles.post');
// })->name('landing.post');

// Route::get('articles', function () {
//     return view('articles.articles');
// })->name('landing.articles');

// Route::get('articles/post-{id}', function ($id) {
//     return view('articles.blog');
// })->name('landing.articles.post');

Route::prefix('article')->name('articles.')->group(function () {
    Route::get('/', [ArtikelController::class, 'index'])->name('index');
    Route::get('{url}', [ArtikelController::class, 'show'])->name('show');
});

// Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::prefix('paket')->name('paket.')->group(function () {
//     Route::get('/', [PaketController::class, 'index'])->name('index');
// });

// Route::prefix('artikel')->name('artikel.')->group(function () {
//     Route::get('/', [ArtikelController::class, 'admin'])->name('index');
// });

Route::prefix('package')->name('package.')->group(function () {
    Route::get('/', [PackageController::class, 'index'])->name('index');
    Route::get('{url}', [PackageController::class, 'show'])->name('show');
});
// protected by auth middleware
Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::prefix('artikel')->name('artikel.')->group(function () {
            Route::get('/', [DashboardController::class, 'artikel'])->name('index');
            Route::get('create', [DashboardController::class, 'artikelCreate'])->name('create');
            Route::post('store', [DashboardController::class, 'artikelStore'])->name('store');
            Route::get('edit/{id}', [DashboardController::class, 'artikelEdit'])->name('edit');
            Route::post('update/{id}', [DashboardController::class, 'artikelUpdate'])->name('update');
            Route::get('delete/{id}', [DashboardController::class, 'artikelDelete'])->name('delete');
        });

        Route::prefix('paket')->name('paket.')->group(function () {
            Route::get('/', [DashboardController::class, 'paket'])->name('index');
            Route::get('create', [DashboardController::class, 'paketCreate'])->name('create');
            Route::post('store', [DashboardController::class, 'paketStore'])->name('store');
            Route::get('edit/{id}', [DashboardController::class, 'paketEdit'])->name('edit');
            Route::post('update/{id}', [DashboardController::class, 'paketUpdate'])->name('update');
            Route::get('delete/{id}', [DashboardController::class, 'paketDelete'])->name('delete');
        });
        // Route::get('paket', [DashboardController::class, 'paket'])->name('paket');
        Route::get('tipe', [DashboardController::class, 'tipe'])->name('tipe');

        // beranda 
        Route::prefix('banner')->name('banner.')->group(function () {
            Route::get('/', [DashboardController::class, 'banner'])->name('index');
            Route::get('create', [DashboardController::class, 'bannerCreate'])->name('create');
            Route::post('store', [DashboardController::class, 'bannerStore'])->name('store');
            Route::get('edit/{id}', [DashboardController::class, 'bannerEdit'])->name('edit');
            Route::put('update/{id}', [DashboardController::class, 'bannerUpdate'])->name('status');
            Route::delete('delete/{id}', [DashboardController::class, 'bannerDelete'])->name('delete');
        });
    });
});
