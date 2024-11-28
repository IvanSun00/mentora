<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'expertise_score',
        'engagement_score',
        'clarity_score',
        'motivating_score',
        'punctuality_score',
        'overall_score',
        'comment',
        'payment_id',
    ];

    // relation
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
