<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    public function view()
    {
        $jobPostings = JobPosting::all();
        return view('viewAllJobs', ['jobPostings' => $jobPostings]);
    }

    public function viewDetails($id)
    {
        $jobPosting = JobPosting::with('applicants')->findOrFail($id);
        $user = Auth::user();

        $applicationStatus = $jobPosting->applicants()
            ->where('applicant_id', $user->id)
            ->exists();

        return view('jobDetails', [
            'jobPosting' => $jobPosting,
            'role' => $user->role,
            'applicationStatus' => $applicationStatus,
        ]);
    }

    public function viewApplicants($id)
    {
        $jobPosting = JobPosting::with('applicants.applicant')->findOrFail($id);

        if ($jobPosting->applicants->isEmpty()) {
            return redirect()->back()->with('error', 'No applicants found.');
        }

        $applicants = $jobPosting->applicants->map(function ($applicant) {
            return $applicant->applicant;
        });

        return view('viewAllApplicants', [
            'applicants' => $applicants,
            'recruitmentId' => $id,
        ]);
    }

    public function endRecruitment($id){
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->status = "Ended";
        $jobPosting->save();

        return redirect()->back()->with('success', 'Recruitment ended successfully.');
    }
}
