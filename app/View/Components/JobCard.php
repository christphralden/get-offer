<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobCard extends Component
{
    public $jobPosting;

    public function __construct($jobPosting)
    {
        $this->jobPosting = $jobPosting;
    }

    public function render()
    {
        return view('components.job-card');
    }
}

