<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobPosting;
use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function getAppliedJobs()
    {
        $userId = Auth::id();

        $appliedJobs = JobPosting::whereHas('applicants', function ($query) use ($userId) {
            $query->where('applicant_id', $userId);
        })->get();

        return view('yourJobs', ['appliedJobs' => $appliedJobs]);
    }

    public function apply($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $userId = Auth::id();

        $existingApplication = Applicant::where('job_posting_id', $jobPosting->id)
            ->where('applicant_id', $userId)
            ->first();

        if ($existingApplication) {
            $existingApplication->delete();

            return redirect()->route('viewAllJobs.details', ['id' => $id])
                ->with('status', 'You have successfully withdrawn your application.');
        }

        Applicant::create([
            'job_posting_id' => $jobPosting->id,
            'applicant_id' => $userId,
        ]);

        return redirect()->route('viewAllJobs.details', ['id' => $id])
            ->with('status', 'You have successfully applied for this job.');
    }

    public function unapply($id)
    {
        $userId = Auth::id();

        $job = JobPosting::findOrFail($id);

        $job->applicants()
            ->where('applicant_id', $userId)
            ->delete();

        return redirect()->route('yourJobs.view')->with('status', 'You have successfully unapplied from the job.');
    }
}
