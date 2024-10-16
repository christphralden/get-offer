<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecruitmentCard extends Component
{
    public $recruitment;

    public function __construct($recruitment)
    {
        $this->recruitment = $recruitment;
    }

    public function render()
    {
        return view('components.recruitment-card');
    }
}
