<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function applied_jobs()
    {
        $userId = Auth::id();
        $appliedJobs = Recruitment::whereJsonContains('applicants', $userId)->get();
        return view('yourJobs', ['appliedJobs' => $appliedJobs]);
    }

    public function apply($id)
    {
        $recruitment = Recruitment::findOrFail($id);
        $userId = auth()->id();
        $applicants = $recruitment->applicants;
        if (in_array($userId, $applicants)) {
            $applicants = array_filter($applicants, function ($applicant) use ($userId) {
                return $applicant !== $userId;
            });
        } else {
            $applicants[] = $userId;
        }
        $recruitment->applicants = $applicants;
        $recruitment->save();
        return redirect()->route('viewAllJobs.details', ['id' => $id]);
    }

    public function unapply($id)
    {
        $job = Recruitment::findOrFail($id);
        $userId = Auth::id();
        $updatedApplicants = array_filter($job->applicants, function($applicantId) use ($userId) {
            return $applicantId != $userId;
        });
        $job->applicants = $updatedApplicants;
        $job->save();
        return redirect()->route('yourJobs.view')->with('status', 'You have successfully unapplied from the job.');
    }
}
