<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    public function view()
    {
        $recruitments = Recruitment::with('user')->get();
        return view('viewAllJobs', ['recruitments' => $recruitments]);
    }

    public function viewDetails($id)
    {
        $recruitment = Recruitment::findOrFail($id);
        $user = Auth::user();
        $role = $user->role;
        return view('jobDetails', ['recruitment' => $recruitment, 'role' => $role]);
    }

    public function viewApplicants($id)
    {
        $recruitment = Recruitment::findOrFail($id);

        $applicantIds = $recruitment->applicants ?? [];

        if (!is_array($applicantIds) || empty($applicantIds)) {
            return redirect()->back()->with('error', 'No applicants found.');
        }

        $applicants = User::whereIn('id', $applicantIds)->get();

        return view('viewAllApplicants', ['applicants' => $applicants]);
    }


    public function endRecruitment($id){
        $recruitment = Recruitment::findOrFail($id);
        $recruitment->status = "Ended";
        $recruitment->save();

        return redirect()->back()->with('success', 'Recruitment ended successfully.');
    }
}
