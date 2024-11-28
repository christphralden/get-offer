<?php
namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Applicant;

/*
* Handles anything related to recruitment activites:
* creating, editing, etc
*/

class RecruitmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'recruiter') {
            return redirect()->back()
                    ->withErrors(['error' => 'You are not authorized to create a job posting.']);
        }

        $ongoingJobPosting= JobPosting::where('recruiter_id', $user->id)
            ->where('status', 'On Going')
            ->get();

        $historyJobPosting= JobPosting::where('recruiter_id', $user->id)
            ->where('status', '!=', 'On Going')
            ->get();

        return view('recruitments', [
            'ongoingJobPosting' => $ongoingJobPosting,
            'historyJobPosting' => $historyJobPosting,
        ]);
    }

    public function create()
    {
        return view('addNewRecruitment');
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'position' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'end_date' => ['required', 'date', 'after:today'],
            'criteria' => ['required', 'array'],
            'requirement' => ['required', 'array'],
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'recruiter') {
            return redirect()->back()
                    ->withErrors(['error' => 'You are not authorized to create a job posting.']);
        }

        $data = $request->all();

        $this->validator($data)->validate();

        try {
            JobPosting::create([
                'position' => $data['position'],
                'place' => $data['place'],
                'salary' => $data['salary'],
                'description' => $data['description'],
                'criteria' => $data['criteria'],
                'requirement' => $data['requirement'],
                'recruiter_id' => $user->id,
                'status' => 'On going',
            ]);

            return redirect()->route('recruitment.view')
                ->with('status', 'Recruitment created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create recruitment: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $jobPosting = JobPosting::with('applicants')->findOrFail($id);
        $user = Auth::user();

        $isRecruiter = $jobPosting->recruiter->id === $user->id;

        return view('recruitmentDetails', [
            'jobPosting' => $jobPosting,
            'isRecruiter' => $isRecruiter,
        ]);
    }

    public function applicants($id)
    {
        $jobPosting = JobPosting::findOrFail($id);

        $applicantIds = $jobPosting->applicants->map(function ($applicant) {
            return $applicant->applicant->id;
        });
        
        // Fetch all applicants with matching applicant_id values
        $applicants = Applicant::where('job_posting_id', $id)->get();

        $rejectedApplicants = $applicants->filter(function ($applicant) {
            return $applicant->status === 'Rejected';
        });
        
        $pendingApplicants = $applicants->filter(function ($applicant) {
            return $applicant->status === 'Pending';
        });

        $acceptedApplicants = $applicants->filter(function ($applicant) {
            return $applicant->status === 'Accepted';
        });

        return view('viewAllApplicants', [
            'rejectedApplicants' => $rejectedApplicants,
            'pendingApplicants' => $pendingApplicants,
            'acceptedApplicants' => $acceptedApplicants,
            'recruitmentId' => $id,
        ]);
    }

    public function endRecruitment($id){
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->status = "Ended";
        $jobPosting->applicants()
               ->where('status', 'Pending')
               ->update(['status' => 'Rejected']);
        $jobPosting->save();

        return redirect()->back()->with('success', 'Recruitment ended successfully.');
    }

    public function edit(){

    }
}
