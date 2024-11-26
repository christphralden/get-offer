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
Route::middleware('auth')->group(function () {
    Route::get('/editProfile', [ProfileController::class, 'view'])->name('editProfile.view');
    Route::patch('/editProfile', [ProfileController::class, 'update'])->name('editProfile.update');
});

// View & Add Recruiter's recruitment
Route::get('/yourRecruit', function () {return view('yourRecruitment');})->name('yourRecruit');


// Recruitment

Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('addRecruitment.create');
Route::post('/recruitment', [RecruitmentController::class, 'store'])->name('addRecruitment.store');

Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.view');

Route::get('/recruitment/{id}', [RecruitmentController::class, 'show'])->name('recruitment.details');

Route::get('/recruitment/{id}/edit', [RecruitmentController::class, 'edit'])->name('recruitment.edit');
Route::post('/recruitment/{id}/end', [RecruitmentController::class, 'endRecruitment'])->name('recruitment.end');

// View All Applicants
Route::get('/recruitment/{id}/applicants', [RecruitmentController::class, 'applicants'])->name('recruitment.applicants');
Route::get('/recruitment/{id}/applicant/{applicantId}', [ApplicantController::class, 'view'])->name('recruitment.applicant');


// JobPosting

Route::get('/jobs/', [JobPostingController::class, 'index'])->name('jobs.view');
Route::get('/job/{id}', [JobPostingController::class, 'show'])->name('job.details');

Route::get('/jobs/applied', [JobSeekerController::class, 'appliedJobs'])->name('jobs.applied');


Route::post('/job/{id}/apply', [JobSeekerController::class, 'apply'])->name('job.apply');
Route::delete('/job/{id}/unapply', [JobSeekerController::class, 'unapply'])->name('job.unapply');

require __DIR__.'/auth.php';
