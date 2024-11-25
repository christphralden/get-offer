<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    protected $fillable = [
        'name',
        'position',
        'place',
        'salary',
        'description',
        'criteria',
        'requirement',
    ];

    protected $casts = [
        'criteria' => 'array',
        'requirement' => 'array',
    ];

    // Relationship to recruiter (user)
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    // Relationship to recruitments
    public function recruitments(): HasMany
    {
        return $this->hasMany(Recruitment::class, 'job_posting_id');
    }
}
