<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobPostingCard extends Component
{
    public $jobPosting;

    public function __construct($jobPosting)
    {
        $this->jobPosting = $jobPosting;
    }

    public function render()
    {
        return view('components.job-posting-card');
    }
}
