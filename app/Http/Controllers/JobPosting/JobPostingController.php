<?php

namespace App\Http\Controllers\JobPosting;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;

/*
* Handles logic for Job Posting.
* This is a general data viewable by all
*/

class JobPostingController extends Controller
{
    public function index(){
        $jobPostings = JobPosting::where('status', '=' , 'On going')->get();
        return view('viewAllJobs', ['jobPostings' => $jobPostings]);
    }

    public function show($id)
    {
        $jobPosting = JobPosting::with('applicants')->findOrFail($id);
        $user = Auth::user();

        $applicationStatus = $jobPosting->applicants()
            ->where('applicant_id', $user->id)
            ->exists();

        $isRecruiter = $jobPosting->recruiter->id === $user->id;

        return view('jobDetails', [
            'jobPosting' => $jobPosting,
            'isRecruiter' => $isRecruiter,
            'applicationStatus' => $applicationStatus,
        ]);
    }
}
