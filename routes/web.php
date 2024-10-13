<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::middleware('auth')->group(function () {
    Route::get('/editProfile', [ProfileController::class, 'view'])->name('editProfile.view');
    Route::patch('/editProfile', [ProfileController::class, 'update'])->name('editProfile.update');
});

require __DIR__.'/auth.php';
