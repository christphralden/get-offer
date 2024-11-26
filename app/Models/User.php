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
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function jobPostings(): HasMany
    {
        return $this->hasMany(JobPosting::class, 'recruiter_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Applicant::class, 'applicant_id');
    }
}
