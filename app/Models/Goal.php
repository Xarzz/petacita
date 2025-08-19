<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'title',
        'description',
        'status',
        'progress',
        'start_date',
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
