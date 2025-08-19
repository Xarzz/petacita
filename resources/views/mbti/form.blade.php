@extends('layouts.app')

@section('title', 'MBTI Input - Student Career Guidance')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 flex items-center justify-center py-12 px-4">
    <div class="max-w-4xl w-full grid lg:grid-cols-2 gap-8 items-center">
        <!-- Left side - Information -->
        <div class="space-y-6">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-brain text-2xl text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ Auth::user()->nama }}!</h1>
                        <p class="text-gray-600">Let's personalize your experience</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-900">Why do we need your MBTI?</h2>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-2 rounded-full mt-1">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Personalized Recommendations</h3>
                            <p class="text-sm text-gray-600">Get career and education suggestions that match your personality</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-green-100 p-2 rounded-full mt-1">
                            <i class="fas fa-brain text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Better Self-Understanding</h3>
                            <p class="text-sm text-gray-600">Learn about your strengths and ideal work environments</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-sm text-blue-800 mb-2"><strong>Don't know your MBTI type?</strong></p>
                <a href="https://www.16personalities.com/free-personality-test" target="_blank" 
                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Take the free test here
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>

        <!-- Right side - Form -->
        <div class="bg-white rounded-lg card-shadow p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Your MBTI Information</h2>
                <p class="text-gray-600 mt-2">Please fill in your MBTI result to personalize your experience</p>
            </div>

            <form method="POST" action="{{ route('mbti.store') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="mbti_type" class="block text-sm font-medium text-gray-700 mb-1">MBTI Type *</label>
                    <select id="mbti_type" name="mbti_type" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select your MBTI type</option>
                        <option value="INTJ">INTJ - The Architect</option>
                        <option value="INTP">INTP - The Thinker</option>
                        <option value="ENTJ">ENTJ - The Commander</option>
                        <option value="ENTP">ENTP - The Debater</option>
                        <option value="INFJ">INFJ - The Advocate</option>
                        <option value="INFP">INFP - The Mediator</option>
                        <option value="ENFJ">ENFJ - The Protagonist</option>
                        <option value="ENFP">ENFP - The Campaigner</option>
                        <option value="ISTJ">ISTJ - The Logistician</option>
                        <option value="ISFJ">ISFJ - The Protector</option>
                        <option value="ESTJ">ESTJ - The Executive</option>
                        <option value="ESFJ">ESFJ - The Consul</option>
                        <option value="ISTP">ISTP - The Virtuoso</option>
                        <option value="ISFP">ISFP - The Adventurer</option>
                        <option value="ESTP">ESTP - The Entrepreneur</option>
                        <option value="ESFP">ESFP - The Entertainer</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (Optional)</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Any additional notes about your personality type..."></textarea>
                </div>

                <div>
                    <label for="date_taken" class="block text-sm font-medium text-gray-700 mb-1">Date Taken (Optional)</label>
                    <input type="date" id="date_taken" name="date_taken"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium text-lg">
                    Submit MBTI
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
