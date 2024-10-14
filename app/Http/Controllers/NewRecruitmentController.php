<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;

class NewRecruitmentController extends Controller
{
    public function view(){
        return view('addNewRecruitment');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'jobDetail.position' => 'required|string|max:255',
            'jobDetail.place' => 'required|string|max:255',
            'jobDetail.shift' => 'required|string|max:255',
            'jobDetail.salary' => 'required|numeric|min:0',
            'jobDesc' => 'required|string',
            'end_date' => 'required|date|after:today',
            'requirement' => 'required|array',
            'criteria' => 'required|array',
        ]);

        // Create a new recruitment entry
        Recruitment::create([
            'jobDetail' => $validated['jobDetail'], // No need to json_encode
            'jobDesc' => $validated['jobDesc'],
            'status' => 'open',
            'end_date' => $validated['end_date'],
            'user_id' => auth()->id(),
            'requirement' => $validated['requirement'], // No need to json_encode
            'criteria' => $validated['criteria'], // No need to json_encode
        ]);

        return redirect()->route('addRecruitment.view')->with('status', 'Recruitment created successfully!'); // Redirect to yourRecruit route
    }

}
