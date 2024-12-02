<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_link',
        'student_id',
    ];

    // relation
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
