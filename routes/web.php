<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Recruitment\NewRecruitmentController;
use App\Http\Controllers\Recruitment\RecruitmentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Recruitment\EditRecruitmentController;
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

// View & Add Recruiter's recruitment
Route::get('/yourRecruit', function () {return view('yourRecruitment');})->name('yourRecruit');
Route::get('/addRecruitment', [NewRecruitmentController::class, 'view'])->name('addRecruitment.view');
Route::post('/addRecruitment', [NewRecruitmentController::class, 'store'])->name('addRecruitment.store');

// View
Route::get('/yourRecruitment', [EditRecruitmentController::class, 'view'])->name('yourRecruitment.view');
Route::get('/yourRecruitment/{id}', [EditRecruitmentController::class, 'edit'])->name('yourRecruitment.edit');

// View All Jobs and Job Details
Route::get('/viewAllJobs', [RecruitmentController::class, 'view'])->name('viewAllJobs.view');
Route::get('/jobDetails/{id}', [RecruitmentController::class, 'viewDetails'])->name('viewAllJobs.details');
Route::post('/jobDetails/{id}/endRecruitment', [RecruitmentController::class, 'endRecruitment'])->name('viewAllJobs.endRecruitment');

// View All Applicants
Route::get('/jobDetails/{id}/applicants', [RecruitmentController::class, 'viewApplicants'])->name('viewAllJobs.applicants');
Route::get('/jobDetails/{id}/applicant/{applicantId}', [ApplicantController::class, 'view'])->name('viewAllJobs.applicantDetail');

// User Apply & Unapply
Route::get('/yourJobs', [JobController::class, 'getAppliedJobs'])->name('yourJobs.view');
Route::post('/applyJob/{id}', [JobController::class, 'apply'])->name('applyJob');
Route::delete('/yourJobs/{id}/unapply', [JobController::class, 'unapply'])->name('jobs.unapply');

// Route::get('/yourJobs', [JobController::class, 'applied_jobs'])->name('yourJobs.view');


require __DIR__.'/auth.php';
