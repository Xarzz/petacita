<?php

namespace App\Http\Controllers;

use App\Models\MbtiResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MBTIResultController extends Controller
{
    public function showForm()
    {
        return view('mbti.form');
    }

    public function store(Request $request)
{
    $request->validate([
        'mbti_type' => 'required|string',
        'description' => 'nullable|string',
        'date_taken' => 'nullable|date',
    ]);

    $user = Auth::user();

    $titles = [
        'INTJ' => 'The Architect',
        'INTP' => 'The Thinker',
        'ENTJ' => 'The Commander',
        'ENTP' => 'The Debater',
        'INFJ' => 'The Advocate',
        'INFP' => 'The Mediator',
        'ENFJ' => 'The Protagonist',
        'ENFP' => 'The Campaigner',
        'ISTJ' => 'The Logistician',
        'ISFJ' => 'The Protector',
        'ESTJ' => 'The Executive',
        'ESFJ' => 'The Consul',
        'ISTP' => 'The Virtuoso',
        'ISFP' => 'The Adventurer',
        'ESTP' => 'The Entrepreneur',
        'ESFP' => 'The Entertainer',
    ];

    $mbtiType = strtoupper($request->mbti_type);
    $mbtiTitle = $titles[$mbtiType] ?? null;

    // Simpan data
    MbtiResult::create([
        'user_id' => $user->id,
        'mbti_type' => $mbtiType,
        'mbti_title' => $mbtiTitle,
        'description' => $request->description,
        'taken_at' => $request->date_taken ?? now(),
    ]);

    return redirect()->route('dashboard')->with('success', 'MBTI information saved successfully!');
}

    
    public function edit()
    {
    $user = Auth::user();
    $result = $user->mbtiResult; // Pastikan relasi sudah dibuat di model User

     return view('mbti.edit', [
        'user' => $user,
        'result' => $result,
        'mbtiResult' => $result, // jika sidebar pakai nama ini
    ]);
    }

    public function update(Request $request)
{
    $request->validate([
        'mbti_type' => 'required|string',
        'description' => 'nullable|string',
        'date_taken' => 'nullable|date',
    ]);

    $user = Auth::user();

    // Mapping MBTI type ke title
    $titles = [
        'INTJ' => 'The Architect',
        'INTP' => 'The Thinker',
        'ENTJ' => 'The Commander',
        'ENTP' => 'The Debater',
        'INFJ' => 'The Advocate',
        'INFP' => 'The Mediator',
        'ENFJ' => 'The Protagonist',
        'ENFP' => 'The Campaigner',
        'ISTJ' => 'The Logistician',
        'ISFJ' => 'The Protector',
        'ESTJ' => 'The Executive',
        'ESFJ' => 'The Consul',
        'ISTP' => 'The Virtuoso',
        'ISFP' => 'The Adventurer',
        'ESTP' => 'The Entrepreneur',
        'ESFP' => 'The Entertainer',
    ];

    $mbtiType = strtoupper($request->mbti_type);
    $mbtiTitle = $titles[$mbtiType] ?? null;

    // Simpan hasil MBTI
    $result = MbtiResult::updateOrCreate(
        ['user_id' => $user->id],
        [
            'mbti_type' => $mbtiType,
            'mbti_title' => $mbtiTitle,
            'description' => $request->description,
            'taken_at' => $request->date_taken ?? now(),
        ]
    );

    return redirect()->route('dashboard')->with('success', 'MBTI information saved successfully!');
}
}