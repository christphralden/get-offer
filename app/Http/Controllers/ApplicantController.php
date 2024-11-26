<?php

namespace App\Http\Controllers;

use App\Models\User;

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

        $applicant = User::findOrFail($applicantId);

        return view(
            'viewApplicantDetail',
            ['applicant' => $applicant]
        );
    }
}
