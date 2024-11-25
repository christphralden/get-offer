<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    protected $fillable = [
        'jobName',
        'jobDetails',
        'jobDesc',
        'criteria',
        'requirement',
    ];

    protected $casts = [
        'jobDetails' => 'array', // Automatically cast JSON to array
        'criteria' => 'array',
        'requirement' => 'array',
    ];

    // Relationship to recruiter (user)
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiterId');
    }

    // Relationship to recruitments
    public function recruitments(): HasMany
    {
        return $this->hasMany(Recruitment::class, 'jobPostingId');
    }
}
