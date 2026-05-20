<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;




// de hoofdroute = ' / '
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


/*
rscr dient om niet telkens get te moeten schrijven bij elke route van news crud systeem, 
auth middleware zorgt ervoor dat alleen ingelogde gebruikers toegang hebben tot deze routes 
*/
Route::resource('news', NewsController::class);



// faq routes
Route::resource('faq', FaqController::class);











//----------------------------------------------------------------------------------------------------------


// het zelf gemaakte routes
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
