<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mbtiResult = $user->mbtiResult;
        $progressTrackings = $user->progressTrackings;
        
        // Calculate progress percentage
        $totalGoals = $progressTrackings->count();
        $completedGoals = $progressTrackings->where('current_status', 'completed')->count();
        $progressPercentage = $totalGoals > 0 ? ($completedGoals / $totalGoals) * 100 : 0;

        return view('dashboard.index', compact('user', 'mbtiResult', 'progressTrackings', 'progressPercentage'));
    }
}
