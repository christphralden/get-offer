<?php

namespace App\Models;

use App\Enums\RecruitmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recruitment extends Model
{
    protected $fillable = [
        'jobPostingId',
        'recruiterId',
        'jobSeekerId',
        'status'
    ];

    protected $casts = [
        'status' => RecruitmentStatus::class,
    ];

    // Relationship to job
    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'jobPostingId');
    }

    // Relationship to recruiter (user)
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiterId');
    }

    // Relationship to job seeker (user)
    public function jobSeeker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'jobSeekerId');
    }
}
