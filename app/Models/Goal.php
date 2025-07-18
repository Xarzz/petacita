<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal_category',
        'goal_title',
        'description',
        'deadline',
        'status',
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
