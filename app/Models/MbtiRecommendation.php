<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mbti_type',
        'recommendation_type',
        'category_id',
    ];
}

