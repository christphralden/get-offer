<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ApplicantCard extends Component
{
    public $applicant;
    public $recruitmentId;
    public $index;

    /**
     * Create a new component instance.
     */
    public function __construct($applicant, $recruitmentId, $index)
    {
        $this->applicant = $applicant;
        $this->recruitmentId = $recruitmentId;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applicant-card');
    }
}
