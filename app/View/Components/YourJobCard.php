<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class YourJobCard extends Component
{
    public $job; // Define a public property to hold the job data

    /**
     * Create a new component instance.
     */
    public function __construct($job)
    {
        $this->job = $job; // Assign the passed job to the property
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.your-job-card');
    }
}
