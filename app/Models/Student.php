<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'full_name',
        'phone_number',
        'email',
        'birth_date',
        'ktp_link',
        'city',
    ];
}
