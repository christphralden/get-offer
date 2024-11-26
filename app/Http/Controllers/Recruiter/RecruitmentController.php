<?php
namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'name' => ['required', 'string', 'max:255'],
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
                'name' => $data['name'],
                'position' => $data['position'],
                'place' => $data['place'],
                'salary' => $data['salary'],
                'description' => $data['description'],
                'criteria' => $data['criteria'],
                'requirement' => $data['requirement'],
                'recruiter_id' => $user->id,
                'status' => 'On going',
            ]);

            return redirect()->route('addRecruitment.view')
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
        $jobPosting = JobPosting::with('applicants.applicant')->findOrFail($id);

        if ($jobPosting->applicants->isEmpty()) {
            return redirect()->back()->with('error', 'No applicants found.');
        }

        $applicants = $jobPosting->applicants->map(function ($applicant) {
            return $applicant->applicant;
        });

        return view('viewAllApplicants', [
            'applicants' => $applicants,
            'recruitmentId' => $id,
        ]);
    }

    public function endRecruitment($id){
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->status = "Ended";
        $jobPosting->save();

        return redirect()->back()->with('success', 'Recruitment ended successfully.');
    }

    public function edit(){

    }
}
