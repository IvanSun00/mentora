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

    // Relationship
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function reviews()
    {
        return $this->hasOne(Review::class, 'payment_id', 'payment_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }


    
}
