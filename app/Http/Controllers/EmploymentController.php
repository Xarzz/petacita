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
   public function index(Request $request)
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

    // Mulai query job rekomendasi
    $jobsQuery = Job::whereIn('id', $jobRecommendations);

    // 🔎 Filter Search
    if ($request->filled('search')) {
        $jobsQuery->where(function($q) use ($request) {
            $q->where('job_title', 'like', "%{$request->search}%")
              ->orWhere('company_name', 'like', "%{$request->search}%")
              ->orWhere('description', 'like', "%{$request->search}%");
        });
    }

    // 🔎 Filter Location
    if ($request->filled('location')) {
        $jobsQuery->where('location', $request->location);
    }

    // 🔎 Filter Type (kolomnya "job_type" di DB, bukan "type")
    if ($request->filled('type')) {
        $jobsQuery->where('job_type', $request->type);
    }

    // (Opsional) kalau mau ada industry, pastikan ada kolom industry di jobs table
    if ($request->filled('industry')) {
        $jobsQuery->where('industry', $request->industry);
    }

    // Paginate hasil
    $jobs = $jobsQuery->orderBy('created_at', 'desc')->paginate(9);

    // Flag apakah ini halaman terakhir
    $isLastPage = $jobs->currentPage() == $jobs->lastPage();

    // Statistik
    $availableJobs = Job::count();
    $mbtiMatches   = $jobs->total();
    $savedCareers  = Saved::where('user_id', $user->id)->count();
    $goalsSet      = Goal::where('user_id', $user->id)->count();

    return view('employment.index', [
        'recommendations' => $jobs,
        'availableJobs'   => $availableJobs,
        'mbtiMatches'     => $mbtiMatches,
        'savedCareers'    => $savedCareers,
        'goalsSet'        => $goalsSet,
        'isLastPage'      => $isLastPage,
    ]);
}


        public function otherJobs(Request $request)
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

        // Mulai query selain rekomendasi
        $otherJobsQuery = Job::whereNotIn('id', $jobRecommendations);

        // 🔎 Filter Search
        if ($request->filled('search')) {
            $otherJobsQuery->where(function($q) use ($request) {
                $q->where('job_title', 'like', "%{$request->search}%")
                ->orWhere('company_name', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%");
            });
        }

        // 🔎 Filter Location
        if ($request->filled('location')) {
            $otherJobsQuery->where('location', $request->location);
        }

        // 🔎 Filter Type (pakai kolom job_type di DB)
        if ($request->filled('type')) {
            $otherJobsQuery->where('job_type', $request->type);
        }

        // 🔎 Filter Industry (opsional kalau ada kolom industry)
        if ($request->filled('industry')) {
            $otherJobsQuery->where('industry', $request->industry);
        }

        // Paginate hasil
        $otherJobs = $otherJobsQuery->orderBy('created_at', 'desc')->paginate(9);

        return view('employment.other', [
            'otherJobs' => $otherJobs
        ]);
    }

}
