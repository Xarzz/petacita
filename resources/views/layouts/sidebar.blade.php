@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\MbtiResult;

    $user = Auth::user();
    $mbtiResult = MbtiResult::where('user_id', $user->id)->first();
@endphp
   
   
   
   <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-16 h-full w-64 sidebar-transition z-40 transform -translate-x-full lg:translate-x-0">
        <div class="h-full flex flex-col">
            <!-- User Info -->
            <div class="p-6 border-b border-primary gradient-bg">
                <div class="flex items-center space-x-3">
                    @php
                        $initials = collect(explode(' ', $user->nama))
                            ->take(2)
                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                            ->implode('');
                    @endphp

                    <div class="h-14 w-14 rounded-full bg-white/20 text-white text-lg flex items-center justify-center font-semibold shadow-inner border border-white/30 backdrop-blur-sm">
                        {{ $initials }}
                    </div>

                    <div>
                        <h3 class="font-semibold text-white">{{ $user?->nama ?? '-' }}</h3>
                        <p class="text-sm text-white opacity-90">{{ $user->kelas }}</p>
                        <div class="flex items-center mt-1">
                            @if ($mbtiResult)
                            <span class="bg-white bg-opacity-20 text-white px-2 py-1 rounded-full text-xs font-medium">
                                {{ $mbtiResult->mbti_type }}
                            </span>
                        @else
                            <span class="bg-white bg-opacity-10 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Belum Tes MBTI
                            </span>
                        @endif

                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <n class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}"
                    class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('mbti.edit') }}"
                    class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('mbti.*') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                    <i class="fas fa-brain"></i>
                    <span>Retake MBTI</span>
                </a>
                
                <div class="pt-2">
                    <p class="px-4 text-xs font-semibold text-secondary uppercase tracking-wider mb-2">Career Paths</p>
                    
                    <a href="{{ route('employment.index') }}" 
                        class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('employment.index') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                        <i class="fas fa-building"></i>
                        <span>Employment</span>
                    </a>
                    
                    <a href="{{ route('higher-education.index') }}" 
                        class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('higher-education.index') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                        <i class="fas fa-building"></i>
                        <span>Higher Education</span>
                    </a>
                    
                    <a href="#" onclick="showSection('entrepreneurship')" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg">
                        <i class="fas fa-lightbulb"></i>
                        <span>Entrepreneurship</span>
                    </a>
                </div>
                
                <div class="pt-2">
                    <p class="px-4 text-xs font-semibold text-secondary uppercase tracking-wider mb-2">Development</p>
                    
                    <a href="#" onclick="showSection('goals-progress')" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg">
                        <i class="fas fa-target"></i>
                        <span>Goals & Progress</span>
                    </a>
                    
                    <a href="#" onclick="showSection('resources')" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg">
                        <i class="fas fa-book"></i>
                        <span>Resources & Tips</span>
                    </a>
                    
                    <a href="#" onclick="showSection('scholarships')" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-lg">
                        <i class="fas fa-award"></i>
                        <span>Scholarships</span>
                    </a>
                </div>

            <!-- Bottom Actions -->
            <div class="p-4 border-t border-primary">
                <button class="w-full flex items-center justify-center space-x-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </div>
            </nav>
        </div>
    </div>
      <script>
document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle")
    const html = document.documentElement

    const savedTheme = localStorage.getItem("theme")
    if (savedTheme === "dark") {
        html.setAttribute("data-theme", "dark")
    } else {
        html.setAttribute("data-theme", "light")
    }

    if (themeToggle) {
        themeToggle.addEventListener("click", () => {
            const currentTheme = html.getAttribute("data-theme")
            const newTheme = currentTheme === "dark" ? "light" : "dark"
            html.setAttribute("data-theme", newTheme)
            localStorage.setItem("theme", newTheme)
        })
    }
})


   const toggle = document.getElementById("userMenuToggle");
    const menu = document.getElementById("userMenu");

    // Toggle menu saat diklik
    toggle.addEventListener("click", function (e) {
        e.stopPropagation(); // biar klik luar masih bisa nutup
        menu.classList.toggle("hidden");
    });

    // Tutup menu kalau klik di luar dropdown
    window.addEventListener("click", function () {
        if (!menu.classList.contains("hidden")) {
            menu.classList.add("hidden");
        }
    });

    // Tutup menu kalau klik di luar dropdown
    window.addEventListener("click", function () {
        if (!menu.classList.contains("hidden")) {
            menu.classList.add("hidden");
        }
    });
</script>