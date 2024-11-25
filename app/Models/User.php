<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role',
        'link',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Relationship to jobs (if the user is a recruiter)
    public function job_postings(): HasMany
    {
        return $this->hasMany(JobPosting::class, 'recruiterId');
    }

    // Relationship to recruitments (if the user is a job seeker)
    public function recruitments(): HasMany
    {
        return $this->hasMany(Recruitment::class, 'jobSeekerId');
    }
}
