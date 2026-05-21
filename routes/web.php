<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// de hoofdroute = ' / '
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/*
rscr dient om niet telkens get te moeten schrijven bij elke route van news crud systeem,
auth middleware zorgt ervoor dat alleen ingelogde gebruikers toegang hebben tot deze routes
*/
Route::resource('news', NewsController::class);

// faq routes
Route::resource('faq', FaqController::class);

// ----------------------------------------------------------------------------------------------------------

// het zelf gemaakte routes
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index']);
    Route::get('/users/create', [AdminUserController::class, 'create']);
    Route::post('/users/create', [AdminUserController::class, 'store']);
    Route::post('/users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin']);
});

require __DIR__.'/auth.php';
