@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-primary">Employment Opportunities</h2>
                <p class="text-secondary mt-2">Find your best match based on your MBTI results and interests.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('saved.index') }}">
                <img src="{{ asset('img/owl1.png') }}" alt="Saved Jobs" 
                    class="w-9 h-9 object-cover rounded-full cursor-pointer" 
                    title="Lihat Saved Jobs">
                </a>
            <img src="{{ asset('img/owl.png') }}" alt="User Avatar" 
                class="w-9 h-9 object-cover rounded-full" 
                title="User Profile">
            </div>
        </div>

         <div class="flex gap-4 mb-6 border-b">
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card-shadow rounded-lg p-6 hover-scale">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-secondary">Available Jobs</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $availableJobs }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="card-shadow rounded-lg p-6 hover-scale">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-secondary">MBTI Matches</p>
                        <p class="text-2xl font-bold text-purple-600">{{ $mbtiMatches }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-brain text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="card-shadow rounded-lg p-6 hover-scale">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-secondary">Saved Careers</p>
                        <p class="text-2xl font-bold text-green-600">{{ $savedCareers }}</p>
                        <a href="{{ route('saved.index') }}" class="text-xs text-green-600 underline">Lihat selengkapnya</a>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-bookmark text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="card-shadow rounded-lg p-6 hover-scale">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-secondary">Goals Set</p>
                        <p class="text-2xl font-bold text-yellow-600">{{ $goalsSet }}</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-bullseye text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

    {{-- Filter Section --}}
<form method="GET" action="{{ route('employment.index') }}" class="flex flex-wrap gap-4 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search jobs..." class="flex-1 min-w-[250px] border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
    
    <select name="industry" class="border border-gray-300 rounded-lg px-4 py-2">
        <option value="">All Industries</option>
        <option value="Technology" {{ request('industry') == 'Technology' ? 'selected' : '' }}>Technology</option>
        <option value="Finance" {{ request('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
        <option value="Healthcare" {{ request('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
        <option value="Education" {{ request('industry') == 'Education' ? 'selected' : '' }}>Education</option>
    </select>

    <select name="location" class="border border-gray-300 rounded-lg px-4 py-2">
        <option value="">All Locations</option>
        <option value="Jakarta" {{ request('location') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
        <option value="Bandung" {{ request('location') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
        <option value="Surabaya" {{ request('location') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
        <option value="Remote" {{ request('location') == 'Remote' ? 'selected' : '' }}>Remote</option>
    </select>
    <select name="type" class="border border-gray-300 rounded-lg px-4 py-2">
        <option value="">All Types</option>
        <option value="Full-time" {{ request('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
        <option value="Part-time" {{ request('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
        <option value="Internship" {{ request('type') == 'Internship' ? 'selected' : '' }}>Internship</option>
        <option value="Project-based" {{ request('type') == 'Project-based' ? 'selected' : '' }}>Project-based</option>
        <option value="Hybrid" {{ request('type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
    </select>


    {{-- tombol submit harus di dalam form --}}
    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
        Filter
    </button>
</form>


         {{-- Job Recommendations --}}
@if ($recommendations->isEmpty())
    <div class="text-center text-secondary py-12">
        <p>No job recommendations available at the moment.</p>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($recommendations as $job)
            @include('partials.job-card', ['job' => $job])
        @endforeach
    </div>

 {{-- Lihat Selengkapnya --}}
@if($isLastPage)
    <div class="mt-6 text-center">
        <a href="{{ route('employment.other') }}" 
           class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
            Lihat Pekerjaan Lainnya
        </a>
    </div>
@endif

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $recommendations->links() }} 
    </div>
@endif


<script>
    document.getElementById('showOtherJobs')?.addEventListener('click', function() {
        document.getElementById('otherJobsSection').classList.remove('hidden');
        this.remove();
    });
</script>
@endsection