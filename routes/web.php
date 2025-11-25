<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
    ]);

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // URL: /admin/dashboard
        // Route Name: admin.dashboard
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        // URL: /admin/posts
        // Route Name: admin.posts.index
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::get('/posts/create', [PostController::class, 'create'])->name('pages.posts.create');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::post('/posts/store', [PostController::class, 'store'])->name('pages.posts.store');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::post('/posts/edit/{id}', [PostController::class, 'edit'])->name('pages.posts.edit');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('pages.posts.destroy');
        
        // URL: /admin/posts
        // Route Name: admin.posts.index
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('pages.categories.create');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('pages.categories.store');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::post('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('pages.categories.edit');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('pages.categories.destroy');
        
        ## Untuk rute setting
        // URL: /admin/posts
        // Route Name: admin.posts.index
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::get('/settings/create', [SettingController::class, 'create'])->name('pages.settings.create');
        
        // URL: /admin/posts/create
        // Route Name: admin.posts.create
        Route::post('/settings/store', [SettingController::class, 'store'])->name('pages.settings.store');

});
