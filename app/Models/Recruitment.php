<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'jobDetail',
        'jobDesc',
        'status',
        'criteria',
        'requirement',
        'applicants',
        'end_date',
        'user_id',
    ];

    protected $casts = [
        'jobDetail' => 'array', // Automatically cast JSON to array
        'criteria' => 'array',
        'requirement' => 'array',
        'applicants' => 'array',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
