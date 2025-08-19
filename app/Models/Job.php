<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobss';

    // Kalau nama tabelnya 'jobs', nggak perlu set $table.
    // Tapi kalau beda, aktifkan ini:
    // protected $table = 'nama_tabel';

    // Kolom yang bisa diisi
    protected $fillable = [
        'mbti_type',
        'job_tite',
        'company_name',
        'description',
        'location',
        'job_type',
        'salary',
        'skills',
        'match_percentage',
    ];

    public function savedByUsers()
    {
        return $this->hasMany(Saved::class);
    }
}
