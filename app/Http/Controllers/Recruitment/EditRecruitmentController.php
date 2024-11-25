<?php
namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditRecruitmentController extends Controller
{
    public function view()
    {
        $userId = Auth::id();

        $ongoingJobPosting= JobPosting::where('recruiter_id', $userId)
            ->where('status', 'On Going')
            ->get();

        $historyJobPosting= JobPosting::where('recruiter_id', $userId)
            ->where('status', '!=', 'On Going')
            ->get();

        // Pass both to the view
        return view('yourRecruitment', [
            'ongoingJobPosting' => $ongoingJobPosting,
            'historyJobPosting' => $historyJobPosting,
        ]);
    }
}
