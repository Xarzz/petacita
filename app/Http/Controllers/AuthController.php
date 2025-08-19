<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            // Check if user has MBTI result
            if (!$user->mbtiResult) {
                return redirect()->route('mbti.form');
            }
            
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'kelas' => 'required|string|max:100', // Validasi kelas juga
    ]);

    $user = User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'kelas' => $request->kelas, // <- Tambah ini
        'role' => 'siswa', // <- Dan ini, kalau emang default role-nya siswa
    ]);

    Auth::login($user);

    return redirect()->route('mbti.form');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
