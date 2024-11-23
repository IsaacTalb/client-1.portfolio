<?php

use Illuminate\Support\Facades\Route;
// Frontend Routes:
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
// Admin Routes:
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ContactMessageController;

// Admin routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/blog-posts', [BlogPostController::class, 'index'])->name('admin.blog');
    Route::get('/blog-posts/create', [BlogPostController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog-posts', [BlogPostController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog-posts/{id}', [BlogPostController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog-posts/{id}', [BlogPostController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy'])->name('admin.blog.destroy');
    

    Route::get('/home-page', [HomePageController::class, 'index'])->name('admin.home');
    Route::get('/home-page/create', [HomePageController::class, 'create'])->name('admin.home.create');
    Route::post('/home-page', [HomePageController::class, 'store'])->name('admin.home.store');
    Route::get('/home-page/{id}', [HomePageController::class, 'edit'])->name('admin.home.edit');
    Route::put('/home-page/{id}', [HomePageController::class, 'update'])->name('admin.home.update');
    Route::delete('/home-page/{id}', [HomePageController::class, 'destroy'])->name('admin.home.destroy');
    

    Route::get('/about-page', [AboutPageController::class, 'index'])->name('admin.about');
    Route::get('/about-page/create', [AboutPageController::class, 'create'])->name('admin.about.create');
    Route::post('/about-page', [AboutPageController::class, 'store'])->name('admin.about.store');
    Route::get('/about-page/{id}', [AboutPageController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about-page/{id}', [AboutPageController::class, 'update'])->name('admin.about.update');
    Route::delete('/about-page/{id}', [AboutPageController::class, 'destroy'])->name('admin.about.destroy');

    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');


// Frontend Routes for Blog Posts
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [\App\Http\Controllers\Front\BlogController::class, 'show'])->name('show');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
