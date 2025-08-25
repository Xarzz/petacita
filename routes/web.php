<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HigherEducationController;
use App\Http\Controllers\MBTIResultController;
use App\Http\Controllers\MbtiRecommendationController;
use App\Http\Controllers\EntrepreneuershipController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\SavedController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {

Route::get('/employment', [EmploymentController::class, 'index'])->name('employment.index');
Route::get('/employment/other', [EmploymentController::class, 'otherJobs'])->name('employment.other');


Route::get('/higher-education', [HigherEducationController::class, 'index'])->name('higher-education.index');

// route untuk lihat semua
Route::get('/higher-education/universities', [HigherEducationController::class, 'universities'])->name('higher.universities');
Route::get('/higher-education/trainings', [HigherEducationController::class, 'trainings'])->name('higher.trainings');
Route::get('/higher-education/dinas', [HigherEducationController::class, 'dinas'])->name('higher.dinas');


Route::get('/entrepreneuership', [EntrepreneuershipController::class, 'index'])->name('entrepreneuership.index');


  Route::get('/mbti', [MBTIResultController::class, 'showForm'])->name('mbti.form');
Route::post('/mbti', [MBTIResultController::class, 'store'])->name('mbti.store');
// Tampilkan form edit MBTI
Route::get('/mbti/edit', [MBTIResultController::class, 'edit'])->name('mbti.edit');
// Update data MBTI
Route::put('/mbti/update', [MBTIResultController::class, 'update'])->name('mbti.update');

Route::get('/recommendations', [MbtiRecommendationController::class, 'index'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/saved', [SavedController::class, 'index'])->name('saved.index');
    Route::post('/saved', [SavedController::class, 'store'])->name('saved.store');
    Route::delete('/saved/{id}', [SavedController::class, 'destroy'])->name('saved.destroy');
});



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});