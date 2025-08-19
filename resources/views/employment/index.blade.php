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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <input type="text" placeholder="Search jobs..." class="w-full px-4 py-2 rounded-lg border border-primary">
            <select class="w-full px-4 py-2 rounded-lg border border-primary">
                <option>All Industries</option>
                <option>Technology</option>
                <option>Finance</option>
                <option>Healthcare</option>
                <option>Education</option>
            </select>
            <select class="w-full px-4 py-2 rounded-lg border border-primary">
                <option>All Locations</option>
                <option>Jakarta</option>
                <option>Bandung</option>
                <option>Surabaya</option>
                <option>Remote</option>
            </select>
            <select class="w-full px-4 py-2 rounded-lg border border-primary">
                <option>All Types</option>
                <option>Full-time</option>
                <option>Part-time</option>
                <option>Internship</option>
                <option>Contract</option>
            </select>
        </div>

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