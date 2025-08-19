@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Semua Sekolah Kedinasan</h1>
            <a href="{{ route('higher-education.index') }}"
               class="text-sm bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
               ⬅ Kembali ke Rekomendasi
            </a>
        </div>

       {{-- DINAS GRID --}}
<div id="content-dinas" class="tab-content hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($dinas as $school)
        <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">

            {{-- Header + Match --}}
            <div class="flex items-center justify-between mb-4">
                <div class="flex gap-4">
                    <div class="text-2xl text-indigo-500">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-primary">{{ $school['name'] }}</h3>
                        <p class="text-sm text-secondary flex items-center gap-1">
                            <i class="fas fa-map-marker-alt"></i> {{ $school['location'] }}
                        </p>
                    </div>
                </div>
                <span class="px-2 py-1 rounded text-xs font-medium
                    {{ $school['match'] >= 90 ? 'bg-green-100 text-green-800' : 
                       ($school['match'] >= 80 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ $school['match'] }}% Match
                </span>
            </div>

            {{-- Stats --}}
            <div class="flex flex-wrap text-sm text-secondary gap-3 mb-3">
                <span><i class="fas fa-star text-yellow-500 mr-1"></i> {{ $school['rating'] }}/5</span>
                <span><i class="fas fa-users mr-1"></i> {{ number_format($school['students']) }} students</span>
                <span><i class="fas fa-graduation-cap mr-1"></i> {{ $school['graduate_rate'] }}% grad rate</span>
            </div>

           {{-- PROGRAMS --}}
            <div class="mb-4">
                <h4 class="text-sm font-semibold text-primary mb-2">Available Programs:</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach ($school['programs'] as $program)
                         <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-xs font-medium">
                        {{ $program }}
                    </span>
                    @endforeach
                </div>
            </div>
            {{-- Actions --}}
            <div class="flex gap-2">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded flex-1">
                    Set Goals
                </button>
                <button class="border border-indigo-600 text-indigo-600 hover:bg-indigo-50 text-sm px-4 py-2 rounded flex-1">
                    Save
                </button>
                <button class="border border-indigo-600 text-indigo-600 hover:bg-indigo-50 text-sm px-4 py-2 rounded flex-1">
                    View Details
                </button>
            </div>
        </div>
        @endforeach
    </div>

        <div class="mt-6">
            {{ $dinas->links() }}
        </div>

    </div>
</div>
@endsection
