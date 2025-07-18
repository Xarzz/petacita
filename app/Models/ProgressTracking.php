<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',     // "pending", "in_progress", "completed"
        'target_date' // optional
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}