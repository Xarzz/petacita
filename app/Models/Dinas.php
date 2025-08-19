<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;

    protected $table = 'dinas';

    protected $fillable = [
        'name',
        'location',
        'rating',
        'students',
        'graduate_rate',
        'match',
        'programs',
    ];

    protected $casts = [
        'programs' => 'array',
        'rating' => 'float',
    ];
}
