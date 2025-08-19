<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index()
    {
       $user = Auth::user();


        // Ambil career path yang dipilih user (misal dari kolom 'career_path' di tabel users)
        $careerPath = $user->career_path; // 'employment' atau 'higher_education'

        // Ambil goals sesuai category
        $goals = Goal::where('user_id', $user->id)
                     ->where('category', $careerPath)
                     ->get();

        return view('goals.index', compact('goals', 'careerPath'));
    }
}
