<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
