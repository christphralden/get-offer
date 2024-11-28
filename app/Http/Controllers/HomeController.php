<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Applicant;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Applicant::select('applicants.job_posting_id', DB::raw('count(*) as total_applicants'), 'job_postings.position')
        ->join('job_postings', 'job_postings.id', '=', 'applicants.job_posting_id') // Join job_postings table
        ->groupBy('applicants.job_posting_id', 'job_postings.position') // Group by both job_posting_id and job position
        ->orderByDesc('total_applicants') // Order by total applicants in descending order
        ->take(3) // Limit to top 3
        ->get();

        return view('home', [
            'isAuthenticated' => Auth::check(),
            'role' => Auth::check() ? Auth::user()->role : null,
            'jobs' => $jobs
        ]);
    }
}
