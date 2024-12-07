<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPosting\JobPostingController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\Recruiter\RecruitmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/editProfile', [ProfileController::class, 'view'])->name('editProfile.view')->middleware('auth');
Route::patch('/editProfile', [ProfileController::class, 'update'])->name('editProfile.update')->middleware('auth');

// Recruitment

Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('addRecruitment.create')->middleware('auth');
Route::post('/recruitment', [RecruitmentController::class, 'store'])->name('addRecruitment.store')->middleware('auth');

Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.view')->middleware('auth');

Route::get('/recruitment/{id}', [RecruitmentController::class, 'show'])->name('recruitment.details')->middleware('auth');

Route::get('/recruitment/{id}/edit', [RecruitmentController::class, 'edit'])->name('recruitment.edit')->middleware('auth');
Route::post('/recruitment/{id}/end', [RecruitmentController::class, 'endRecruitment'])->name('recruitment.end')->middleware('auth');

// View All Applicants
Route::get('/recruitment/{id}/applicants', [RecruitmentController::class, 'applicants'])->name('recruitment.applicants')->middleware('auth');
Route::get('/recruitment/{id}/applicant/{applicantId}', [ApplicantController::class, 'view'])->name('recruitment.applicant')->middleware('auth');
Route::put('/recruitment/{id}/applicant/{applicantId}/accept', [ApplicantController::class, 'accept'])->name('recruitment.accept')->middleware('auth');
Route::put('/recruitment/{id}/applicant/{applicantId}/reject', [ApplicantController::class, 'reject'])->name('recruitment.reject')->middleware('auth');

// JobPosting

Route::get('/jobs', [JobPostingController::class, 'index'])->name('jobs.view');
Route::get('/job/{id}', [JobPostingController::class, 'show'])->name('job.details')->middleware('auth');

Route::get('/jobs/applied', [JobSeekerController::class, 'appliedJobs'])->name('jobs.applied')->middleware('auth');


Route::post('/job/{id}/apply', [JobSeekerController::class, 'apply'])->name('job.apply')->middleware('auth');
Route::delete('/job/{id}/unapply', [JobSeekerController::class, 'unapply'])->name('job.unapply')->middleware('auth');

require __DIR__.'/auth.php';
