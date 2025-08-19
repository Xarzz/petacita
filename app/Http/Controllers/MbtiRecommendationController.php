<?php

namespace App\Http\Controllers;

use App\Models\MbtiRecommendation;
use Illuminate\Support\Facades\Auth;

class MbtiRecommendationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mbti = $user->mbti;

        $recommendations = MbtiRecommendation::where('mbti_type', $mbti)->get();

        return response()->json($recommendations);
    }
}

