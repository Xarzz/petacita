@extends('layouts.app')

@section('title', 'Login - Student Career Guidance')

@section('content')
<div class="min-h-screen gradient-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl w-full grid lg:grid-cols-2 gap-8 items-center">
        <!-- Left side - Hero content -->
        <div class="hidden lg:block text-white space-y-8">
            <div class="space-y-4">
                <h1 class="text-4xl font-bold">Discover Your Perfect Career Path</h1>
                <p class="text-xl opacity-90">
                    Get personalized career guidance based on your MBTI personality type and unlock your potential.
                </p>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">MBTI-Based Guidance</h3>
                        <p class="opacity-80">Personalized recommendations based on your personality</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Career & Education</h3>
                        <p class="opacity-80">Find the right major and career path for you</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-target text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Track Progress</h3>
                        <p class="opacity-80">Monitor your journey toward your career goals</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side - Auth forms -->
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-lg card-shadow p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Welcome</h2>
                    <p class="text-gray-600 mt-2">Sign in to your account or create a new one</p>
                </div>

                <!-- Tab buttons -->
                <div class="flex mb-6">
                    <button onclick="showTab('login')" class="tab-button flex-1 py-2 px-4 bg-blue-600 text-white rounded-l-lg font-medium">
                        Login
                    </button>
                    <button onclick="showTab('register')" class="tab-button flex-1 py-2 px-4 bg-gray-200 text-gray-700 rounded-r-lg font-medium">
                        Register
                    </button>
                </div>

                <!-- Login Form -->
                <div id="login" class="tab-content">
                    <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="your.email@example.com">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter your password">
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                            Login
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                    </div>
                </div>

                <!-- Register Form -->
                <div id="register" class="tab-content hidden">
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="nama" name="nama" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Your full name">
                        </div>
                        <div>
                            <label for="reg-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="reg-email" name="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="your.email@example.com">
                        </div>
                        <div>
                            <label for="reg-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="reg-password" name="password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Create a password">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Confirm your password">
                        </div>
                        <!-- Tambahan input kelas -->
                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                            <input type="text" id="kelas" name="kelas" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Contoh: XII RPL 1">
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                            Register
                        </button>
                    </form>
                </div>


                @if ($errors->any())
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
