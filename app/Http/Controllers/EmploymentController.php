<?php

namespace App\Http\Controllers;

use App\Models\MBTIRecommendation;
use App\Models\Job;
use App\Models\Saved;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Ambil MBTI terbaru
    $mbtiType = \App\Models\MbtiResult::where('user_id', $user->id)
        ->latest()
        ->value('mbti_type');

    // Ambil rekomendasi kategori employment
    $jobRecommendations = MBTIRecommendation::where('mbti_type', $mbtiType)
        ->where('recommendation_type', 'employment')
        ->pluck('category_id');

    // Job rekomendasi MBTI (pakai pagination)
    $jobs = Job::whereIn('id', $jobRecommendations)
        ->orderBy('created_at', 'desc')
        ->paginate(9);

    // Flag apakah ini halaman terakhir
    $isLastPage = $jobs->currentPage() == $jobs->lastPage();

    // Statistik
    $availableJobs = Job::count();
    $mbtiMatches = $jobs->total();
    $savedCareers = Saved::where('user_id', $user->id)->count();
    $goalsSet = Goal::where('user_id', $user->id)->count();

    return view('employment.index', [
        'recommendations' => $jobs,
        'availableJobs' => $availableJobs,
        'mbtiMatches' => $mbtiMatches,
        'savedCareers' => $savedCareers,
        'goalsSet' => $goalsSet,
        'isLastPage' => $isLastPage, // 🔥 kirim ke view
    ]);
}

    public function otherJobs()
    {
        // Pekerjaan selain rekomendasi MBTI
        $user = Auth::user();
        $mbtiType = \App\Models\MbtiResult::where('user_id', $user->id)
            ->latest()
            ->value('mbti_type');

        $jobRecommendations = MBTIRecommendation::where('mbti_type', $mbtiType)
            ->where('recommendation_type', 'employment')
            ->pluck('category_id');

        $otherJobs = Job::whereNotIn('id', $jobRecommendations)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('employment.other', [
            'otherJobs' => $otherJobs
        ]);
    }
}
