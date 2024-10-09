<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index']
)->name('home');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile.edit');
    Route::patch('/editProfile', [ProfileController::class, 'update'])->name('editProfile.update');
    Route::delete('/editProfile', [ProfileController::class, 'destroy'])->name('editProfile.destroy');
});

require __DIR__.'/auth.php';
