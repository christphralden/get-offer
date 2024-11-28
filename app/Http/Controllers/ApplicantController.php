<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applicant;

/*
* Handles anything related to the applicants:
* applicant details, accpeting, rejecting, etc
*/

class ApplicantController extends Controller
{
    public function view($id, $applicantId)
    {
        // middleware aja
        // if (Auth::user()->role !== 'recruiter') {
        //     abort(403, 'Unauthorized access - recruiters only.');
        // }

        $applicant = Applicant::where('applicant_id', $applicantId)->first();

        return view(
            'viewApplicantDetail',
            ['applicant' => $applicant, 'recruitmentId' => $id]
        );
    }

    public function accept($id, $applicantId){
        $applicant = Applicant::where('applicant_id', $applicantId)
                          ->where('job_posting_id', $id)
                          ->first();

        if ($applicant) {
            $applicant->status = 'Accepted';
            $applicant->save();

            return redirect()->route('recruitment.applicants', ['id' => $id]);
        } else {
            return back()->with('error', 'Applicant not found!');
        }
    }

    public function reject($id, $applicantId){
        $applicant = Applicant::where('applicant_id', $applicantId)
                          ->where('job_posting_id', $id)
                          ->first();

        if ($applicant) {
            $applicant->status = 'Rejected';
            $applicant->save();

            return redirect()->route('recruitment.applicants', ['id' => $id]);
        } else {
            return back()->with('error', 'Applicant not found!');
        }
    }

}
