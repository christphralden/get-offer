<?php

namespace App\Models;

use App\Enums\RecruitmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    protected $fillable = [
        'recruiter_id',
        'name',
        'position',
        'place',
        'salary',
        'description',
        'criteria',
        'requirement',
        'status'
    ];

    protected $casts = [
        'criteria' => 'array',
        'requirement' => 'array',
        'status' => RecruitmentStatus::class,
    ];

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'job_posting_id');
    }
}
