<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| 1. AUTHENTICATION & FRONTEND
|--------------------------------------------------------------------------
*/

// Matikan Login bawaan, sisakan Register (sesuai request)
Auth::routes([
    'login'    => false,
    'register' => true,
    'reset'    => false,
    'verify'   => false
]);

// Custom Login URL (/admin/login)
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);

// Halaman Depan (Public)
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/detail-post', function() {
    return view('detail-post');
});


/*
|--------------------------------------------------------------------------
| 2. ADMIN DASHBOARD (Backend)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')      // URL depannya pakai /admin/...
    ->name('admin.')       // Nama route depannya pakai admin.
    ->group(function () {

        // --- DASHBOARD ---
        // Route: admin.dashboard
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');


        // --- POSTS ---
        // Grouping khusus PostController biar kodingan pendek
        Route::controller(PostController::class)
            ->prefix('posts')
            ->name('posts.')
            ->group(function () {
                Route::get('/', 'index')->name('index');             // admin.posts.index
                Route::get('/create', 'create')->name('create');     // admin.posts.create
                Route::post('/', 'store')->name('store');            // admin.posts.store (Action Form Create)
                Route::get('/{id}/edit', 'edit')->name('edit');      // admin.posts.edit
                Route::put('/{id}', 'update')->name('update');       // admin.posts.update (Action Form Edit)
                Route::delete('/{id}', 'destroy')->name('destroy');  // admin.posts.destroy
                
                // Safety Net (Penangkap URL Error di HP)
                Route::get('/{id}', 'show')->name('show');
            });


        // --- CATEGORIES ---
        Route::controller(CategoryController::class)
            ->prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
                // Route khusus ganti status (AJAX)
                Route::patch('/{id}/status', 'updateStatus')->name('status');

            });


        // --- SETTINGS ---
        Route::controller(SettingController::class)
            ->prefix('settings')
            ->name('settings.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                
                // Tambahan kalau nanti mau update setting
                Route::put('/', 'update')->name('update');
            });
            
            Route::fallback(function () {
                return redirect()->route('admin.dashboard'); // Lempar ke dashboard
    });

});
