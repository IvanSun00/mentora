<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = [
        'bio',
        'hourly_rate',
        'cv_link',
        'subject',
        'student_id',
    ];
}
