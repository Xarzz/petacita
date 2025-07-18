<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBTIResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mbti_type',
        'description',
        'taken_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
