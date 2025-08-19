@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        {{-- Kampus --}}
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Rekomendasi Universitas</h1>
                <a href="{{ route('higher.universities') }}"
                   class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                   Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($universities as $uni)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $uni->name }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">📍 {{ $uni->location }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">⭐ {{ $uni->rating }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Pelatihan --}}
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Rekomendasi Pelatihan</h1>
                <a href="{{ route('higher.trainings') }}"
                   class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                   Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($trainings as $training)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $training->name }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">📍 {{ $training->location }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">⭐ {{ $training->rating }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Sekolah Kedinasan --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Rekomendasi Sekolah Kedinasan</h1>
                <a href="{{ route('higher.dinas') }}"
                   class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                   Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($dinas as $dn)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $dn->name }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">📍 {{ $dn->location }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">⭐ {{ $dn->rating }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
