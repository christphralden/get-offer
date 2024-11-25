<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'recruiterId',
        'jobName',
        'jobDetails',// posisi / job title
        'jobDesc', // penjelasan job
        'criteria',
        'requirement',
    ];

    protected $casts = [
        'jobDetail' => 'array', // Automatically cast JSON to array
        'criteria' => 'array',
        'requirement' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
