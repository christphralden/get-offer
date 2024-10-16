<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    public function view()
    {
        $recruitments = Recruitment::with('user')->get();
        return view('viewAllJobs', ['recruitments' => $recruitments]);
    }

    public function show($id)
    {
        $recruitment = Recruitment::findOrFail($id);
        return view('jobDetails', ['recruitment' => $recruitment]);
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


}
