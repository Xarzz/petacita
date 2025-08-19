<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CareerInformation;
use App\Models\MbtiResult;
use App\Models\Saved;
use App\Models\Job;
use App\Models\Goal;

class RecommendationController extends Controller
{
    public function employment()
    {
        $user = Auth::user();

        // Ambil MBTI user
        $mbti_user = MbtiResult::where('user_id', $user->id)->first();

        // Ambil semua pekerjaan tersedia
        $available_jobs = Job::count();

        // Kalau MBTI ada, filter job sesuai MBTI
        $jobs_result = [];
        if ($mbti_user) {
            $jobs_result = Job::where('mbti_type', $mbti_user->mbti_type)->get();
        }

        return response()->json([
            'mbti_user' => $mbti_user,
            'jobRecommendations_array' => $jobs_result,
            'jobs_result' => $jobs_result,
            'available_jobs_count' => $available_jobs,
            'mbti_matches_count' => $mbti_user ? count($jobs_result) : 0,
            'saved_careers_count' => Saved::where('user_id', $user->id)->count(),
            'goals_set_count' => Goal::where('user_id', $user->id)->count(),
        ]);
    }
}
