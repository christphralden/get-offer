<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewRecruitmentController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\EditJobController;
use App\Http\Controllers\EditRecruitmentController;
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
Route::get('/yourRecruit', function () {return view('yourRecruitment');})->name('yourRecruit');

Route::get('/addRecruitment', [NewRecruitmentController::class, 'view'])->name('addRecruitment.view');
Route::post('/addRecruitment', [NewRecruitmentController::class, 'store'])->name('addRecruitment.store');

Route::get('/viewAllJobs', [RecruitmentController::class, 'view'])->name('viewAllJobs.view');
Route::get('/jobDetails/{id}', [RecruitmentController::class, 'show'])->name('viewAllJobs.details');

Route::post('/applyJob/{id}', [RecruitmentController::class, 'apply'])->name('applyJob');

Route::get('/yourJobs', [EditJobController::class, 'applied_jobs'])->name('yourJobs.view');
Route::delete('/yourJobs/{id}/unapply', [EditJobController::class, 'unapply'])->name('jobs.unapply');

Route::get('/yourRecruitment', [EditRecruitmentController::class, 'view'])->name('yourRecruitment.view');
Route::get('/yourRecruitment/{id}', [EditRecruitmentController::class, 'edit'])->name('yourRecruitment.edit');


require __DIR__.'/auth.php';
