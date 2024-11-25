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
        'phoneNumber',
        'role',
        'link',
        'jobs'
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
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'recruiterId');
    }

    // Relationship to recruitments (if the user is a job seeker)
    public function recruitments(): HasMany
    {
        return $this->hasMany(Recruitment::class, 'jobSeekerId');
    }
}
