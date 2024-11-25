<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewRecruitmentController extends Controller
{
    public function validator(array $data)
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

    public function view()
    {
        return view('addNewRecruitment');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        $data = $request->all();

        $this->validator($data)->validate();

        try {
            $jobPosting = JobPosting::create([
                'name' => $data['name'],
                'position' => $data['position'],
                'place' => $data['place'],
                'salary' => $data['salary'],
                'description' => $data['description'],
                'criteria' => $data['criteria'],
                'requirement' => $data['requirement'],
                'recruiter_id' => $userId,
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
}
