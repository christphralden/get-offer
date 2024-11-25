<?php
namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recruitment;

class EditRecruitmentController extends Controller
{
    public function view()
    {
        $userId = Auth::id();

        // Retrieve "On Going" recruitments
        $ongoingRecruitments = Recruitment::where('recruiter_id', $userId)
            ->where('status', 'On Going')
            ->get();

        // Retrieve recruitments that are NOT "On Going" (Recruitment History)
        $historyRecruitments = Recruitment::where('recruiter_id', $userId)
            ->where('status', '!=', 'On Going')
            ->get();

        // Pass both to the view
        return view('yourRecruitment', [
            'ongoingRecruitments' => $ongoingRecruitments,
            'historyRecruitments' => $historyRecruitments,
        ]);
    }
}
