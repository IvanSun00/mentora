<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'hour_start',
        'hour_end',
        'is_available',
        'mentor_id',
        'payment_id',
    ];
}
