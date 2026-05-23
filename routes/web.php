<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// de hoofdroute = ' / '
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// news routes
Route::get('/news', [NewsController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/news/create', [NewsController::class, 'create']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/{id}/edit', [NewsController::class, 'edit']);
    Route::patch('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
});

Route::get('/news/{id}', [NewsController::class, 'show']);

// faq routes
Route::get('/faq', [FaqController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/faq/create', [FaqController::class, 'create']);
    Route::post('/faq', [FaqController::class, 'store']);
    Route::get('/faq/{id}/edit', [FaqController::class, 'edit']);
    Route::patch('/faq/{id}', [FaqController::class, 'update']);
    Route::delete('/faq/{id}', [FaqController::class, 'destroy']);
});

Route::get('/faq/{id}', [FaqController::class, 'show']);

// contact routes
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);

// publieke profielpagina voor alle bezoekers
Route::get('/users/{id}', [ProfileController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::get('/admin/users/create', [AdminUserController::class, 'create']);
    Route::post('/admin/users/create', [AdminUserController::class, 'store']);
    Route::post('/admin/users/{id}/toggle-admin', [AdminUserController::class, 'toggleAdmin']);
});

// het zelf gemaakte routes
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
