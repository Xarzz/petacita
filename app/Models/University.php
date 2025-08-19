<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

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
