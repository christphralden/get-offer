<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;

/*
* Handles job seeker actions.
* This includes any CRUD operations such as:
* - Applying for jobs
* - Unapplying from jobs
*/

class JobSeekerController extends Controller
{
    public function appliedJobs()
    {
        $userId = Auth::id();

        $appliedJobs = JobPosting::whereHas('applicants', function ($query) use ($userId) {
            $query->where('applicant_id', $userId);
        })->get();

        $pendingJobs = $appliedJobs->filter(function ($job) {
            return $job->applicant->status === 'Pending';
        });

        $acceptedJobs = $appliedJobs->filter(function ($job) {
            return $job->applicant->status === 'Accepted';
        });

        return view('yourJobs', ['pendingJobs' => $pendingJobs, 'acceptedJobs' => $acceptedJobs, 'jobHistory' => $appliedJobs]);
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

            return redirect()->route('job.details', ['id' => $id])
                ->with('status', 'You have successfully withdrawn your application.');
        }

        Applicant::create([
            'job_posting_id' => $jobPosting->id,
            'applicant_id' => $userId,
            'status' => "Pending" // defaults to pending
        ]);

        return redirect()->route('job.details', ['id' => $id])
            ->with('status', 'You have successfully applied for this job.');
    }

    public function unapply($id)
    {
        $userId = Auth::id();

        $job = JobPosting::findOrFail($id);

        $job->applicants()
            ->where('applicant_id', $userId)
            ->delete();

        return redirect()->route('jobs.applied')->with('status', 'You have successfully unapplied from the job.');
    }
}
