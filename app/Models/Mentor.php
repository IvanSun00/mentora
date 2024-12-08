<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'bio',
        'teaching_type',
        'hourly_rate',
        'cv_link',
        'subject',
        'student_id',
    ];


    // Relationship
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
