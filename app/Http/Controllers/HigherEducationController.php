<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Training;
use App\Models\Dinas;
use Illuminate\Http\Request;

class HigherEducationController extends Controller
{
    public function index()
    {
        // ambil top 5
        $topUniversities = University::orderBy('rating', 'desc')->take(5)->get();
        $topTrainings = Training::orderBy('rating', 'desc')->take(5)->get();
        $topDinas = Dinas::orderBy('rating', 'desc')->take(5)->get();

        return view('higher-education.index', [
            'universities' => $topUniversities,
            'trainings' => $topTrainings,
            'dinas' => $topDinas,
        ]);
    }

    // full list universities
    public function universities()
    {
        $universities = University::orderBy('rating', 'desc')->paginate(9);
        return view('higher-education.universities', compact('universities'));
    }

    // full list trainings
    public function trainings()
    {
        $trainings = Training::orderBy('rating', 'desc')->paginate(9);
        return view('higher-education.trainings', compact('trainings'));
    }

    // full list dinas
    public function dinas()
    {
        $dinas = Dinas::orderBy('rating', 'desc')->paginate(9);
        return view('higher-education.dinas', compact('dinas'));
    }
}
