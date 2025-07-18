<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path_type',
        'institution_name',
        'major',
        'company_name',
        'position',
        'startup_idea',
        'business_type',
        'scholarship_name',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
