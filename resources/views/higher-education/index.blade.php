@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-primary">Higher Education</h2>
                <p class="text-secondary mt-2">Find your best decision based on your interests</p>
            </div>
               <div class="flex items-center gap-4">
                <a href="{{ route('saved.index') }}">
                <img src="{{ asset('img/owl.png') }}" alt="Saved Jobs" 
                    class="w-9 h-9 object-cover rounded-full cursor-pointer" 
                    title="Lihat Saved Jobs">
                </a>
                <img src="{{ asset('img/owl.png') }}" alt="User Avatar" 
                    class="w-9 h-9 object-cover rounded-full" 
                    title="User Profile">
            </div>
        </div>

        {{-- TABS --}}
        <div class="flex gap-4 mb-6 border-b">
            <button onclick="showTab('universities')" id="tab-universities" class="tab-btn active">Universities</button>
            <button onclick="showTab('trainings')" id="tab-trainings" class="tab-btn">Pelatihan Kerja</button>
            <button onclick="showTab('dinas')" id="tab-dinas" class="tab-btn">Sekolah Kedinasan</button>
        </div>

        {{-- SEARCH & FILTER --}}
        <div class="flex flex-wrap gap-4 mb-6">
            <input type="text" placeholder="Search universities, programs, or locations..."
                   class="flex-1 min-w-[250px] border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <select class="border border-gray-300 rounded-lg px-4 py-2">
                <option>All Regions</option>
                <option>Jakarta</option>
                <option>Bandung</option>
                <option>Yogyakarta</option>
                <option>Surabaya</option>
            </select>
            <select class="border border-gray-300 rounded-lg px-4 py-2">
                <option>All Types</option>
                <option>Public University</option>
                <option>Private University</option>
                <option>Institute</option>
                <option>Polytechnic</option>
            </select>
            <select class="border border-gray-300 rounded-lg px-4 py-2">
                <option>All Fields</option>
                <option>Technology</option>
                <option>Business</option>
                <option>Engineering</option>
                <option>Science</option>
            </select>
        </div>

           {{-- UNIVERSITIES GRID --}}
<div id="content-universities" class="tab-content hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($universities as $uni)
        <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">

            {{-- Header + Match --}}
            <div class="flex items-center justify-between mb-4">
                <div class="flex gap-4">
                    <div class="text-2xl text-indigo-500">
                        <i class="fas fa-university"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-primary">{{ $uni['name'] }}</h3>
                        <p class="text-sm text-secondary flex items-center gap-1">
                            <i class="fas fa-map-marker-alt"></i> {{ $uni['location'] }}
                        </p>
                    </div>
                </div>
                <span class="px-2 py-1 rounded text-xs font-medium
                    {{ $uni['match'] >= 90 ? 'bg-green-100 text-green-800' : 
                       ($uni['match'] >= 80 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ $uni['match'] }}% Match
                </span>
            </div>

            {{-- Stats --}}
            <div class="flex flex-wrap text-sm text-secondary gap-3 mb-3">
                <span><i class="fas fa-star text-yellow-500 mr-1"></i> {{ $uni['rating'] }}/5</span>
                <span><i class="fas fa-users mr-1"></i> {{ number_format($uni['students']) }} students</span>
                <span><i class="fas fa-graduation-cap mr-1"></i> {{ $uni['graduate_rate'] }}% grad rate</span>
            </div>

            {{-- Programs --}}
            <div class="flex flex-col gap-2 mb-4">
                <h4 class="text-sm font-semibold text-primary">Recommended Programs:</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach ($uni['programs'] as $program)
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
    {{-- CTA Lihat Semua --}}
    <div class="mt-6 text-center">
        <a href="{{ route('higher.universities') }}"
           class="inline-block text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-md transition">
            Lihat Semua Universitas
        </a>
    </div>
</div>



{{-- TRAININGS GRID --}}
<div id="content-trainings" class="tab-content hidden">
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
{{-- CTA Lihat Semua --}}
    <div class="mt-6 text-center">
        <a href="{{ route('higher.trainings') }}"
           class="inline-block text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-md transition">
            Lihat Semua Pelatihan Kerja
        </a>
    </div>
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
     {{-- CTA Lihat Semua --}}
    <div class="mt-6 text-center">
        <a href="{{ route('higher.universities') }}"
           class="inline-block text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-md transition">
            Lihat Semua Sekolah Kedinasan
        </a>
    </div>
</div>







{{-- SCRIPT --}}
<script>
    function showTab(tabName) {
        // Sembunyiin semua konten
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        // Hapus active di semua tombol
        document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('border-b-2', 'border-indigo-500', 'text-indigo-600', 'font-semibold'));

        // Tampilkan tab yang dipilih
        document.getElementById('content-' + tabName).classList.remove('hidden');
        // Kasih active style di tombol
        document.getElementById('tab-' + tabName).classList.add('border-b-2', 'border-indigo-500', 'text-indigo-600', 'font-semibold');
    }

    // Pas halaman pertama kali load, langsung set tab Universities sebagai default
    document.addEventListener("DOMContentLoaded", function() {
        showTab('universities');
    });
</script>







    </div>
</div>
@endsection
