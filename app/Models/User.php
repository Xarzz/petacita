<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'kelas',
        'password',
    ];

    public function mbtiResult()
{
    return $this->hasOne(MbtiResult::class, 'user_id');
}

public function savedJobs()
{
    return $this->hasMany(Saved::class);
}

public function goals()
{
    return $this->hasMany(Goal::class);
}

public function progressTrackings()
{
    return $this->hasMany(ProgressTracking::class);
}

// User.php
public function mbtiRecommendations()
{
    return $this->hasManyThrough(MbtiRecommendation::class, MbtiResult::class, 'user_id', 'mbti_type', 'id', 'mbti_type');
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
