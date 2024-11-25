<?php

namespace App\Models;

use App\Enums\RecruitmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recruitment extends Model
{
    protected $fillable = [
        'job_posting_id',
        'recruiter_id',
        'job_seeker_id',
        'status'
    ];

    protected $casts = [
        'status' => RecruitmentStatus::class,
    ];

    // Relationship to job
    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id');
    }

    // Relationship to recruiter (user)
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    // Relationship to job seeker (user)
    public function jobSeeker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'job_seeker_id');
    }
}
