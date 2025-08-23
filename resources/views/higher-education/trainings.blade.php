@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-primary">Semua Pelatihan</h1>
            <p class="text-secondary mt-2">You can find out all of the trainings</p>
        </div>
        <div class="flexitems-center gap-4">
            <a href="{{ route('higher-education.index') }}"
               class="text-sm bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
               ⬅ Kembali ke Rekomendasi
            </a>
        </div>
        </div>

        <div class="flex gap-4 mb-6 border-b">
        </div>

        {{-- FILTER FORM --}}
        <form method="GET" action="{{ route('higher.trainings') }}" class="flex flex-wrap gap-4 mb-6">
           <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Search universities, programs, or locations..."
                class="flex-1 min-w-[250px] border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">


            <select name="location" class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Semua Lokasi</option>
                <option value="West Java" {{ request('location') == 'West Java' ? 'selected' : '' }}>West Java</option>
                <option value="East Java" {{ request('location') == 'East Java' ? 'selected' : '' }}>East Java</option>
                <option value="Jakarta" {{ request('location') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                <option value="Bali" {{ request('location') == 'Bali' ? 'selected' : '' }}>Bali</option>
            </select>

            <select name="rating" class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Semua Rating</option>
                <option value="4.0" {{ request('rating') == '4.0' ? 'selected' : '' }}>4.0+</option>
                <option value="4.3" {{ request('rating') == '4.3' ? 'selected' : '' }}>4.3 - 4.5</option>
                <option value="4.5" {{ request('rating') == '4.5' ? 'selected' : '' }}>4.5+</option>
            </select>

            <input type="text" name="skill" placeholder="Skill (ex: Python)"
                value="{{ request('skill') }}"
                class="border border-gray-300 rounded-lg px-4 py-2">
            
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">Filter</button>
        </form>

        {{-- TRAININGS GRID --}}
        <div id="content-trainings" class="tab-content">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($trainings as $training)
                <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">

                    {{-- Header + Match --}}
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex gap-4">
                            <div class="text-2xl text-indigo-500">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">{{ $training['name'] }}</h3>
                                <p class="text-sm text-secondary flex items-center gap-1">
                                    <i class="fas fa-map-marker-alt"></i> {{ $training['location'] }}
                                </p>
                            </div>
                        </div>
                        <span class="px-2 py-1 rounded text-xs font-medium
                            {{ $training['match'] >= 90 ? 'bg-green-100 text-green-800' : 
                               ($training['match'] >= 80 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ $training['match'] }}% Match
                        </span>
                    </div>

                    {{-- Stats --}}
                    <div class="flex flex-wrap text-sm text-secondary gap-3 mb-3">
                        <span><i class="fas fa-star text-yellow-500 mr-1"></i> {{ $training['rating'] }}/5</span>
                        <span><i class="fas fa-clock mr-1"></i> {{ $training['duration'] }} months</span>
                        <span><i class="fas fa-money-bill-wave mr-1"></i> {{ $training['fee'] }}</span>
                    </div>

                    {{-- Skills --}}
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-primary mb-2">Skills Developed:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($training['skills'] as $skill)
                                <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-xs font-medium">
                                    {{ $skill }}
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
                {{ $trainings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
