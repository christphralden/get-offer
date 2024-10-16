<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

class EditJobController extends Controller
{
    public function applied_jobs()
    {
        $userId = Auth::id();
        $appliedJobs = Recruitment::whereJsonContains('applicants', $userId)->get();
        return view('yourJobs', ['appliedJobs' => $appliedJobs]);
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
