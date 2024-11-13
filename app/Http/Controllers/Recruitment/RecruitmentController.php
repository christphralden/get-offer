<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
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

    public function viewApplicants($id){
        return view('viewAllApplicants');
    }
}
