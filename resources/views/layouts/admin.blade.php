<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Career Guidance Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        /* Theme Variables */
        :root {
            /* Light Theme */
            --bg-primary: #f9fafb;
            --bg-secondary: #ffffff;
            --bg-tertiary: #f3f4f6;
            --bg-accent: #f0f9ff;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --text-accent: #3b82f6;
            --border-primary: #e5e7eb;
            --border-secondary: #d1d5db;
            --shadow-primary: rgba(0, 0, 0, 0.1);
            --shadow-secondary: rgba(0, 0, 0, 0.05);
            --gradient-from: #667eea;
            --gradient-to: #764ba2;
        }

        [data-theme="dark"] {
            /* Dark Theme */
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --bg-accent: #1e3a8a;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-accent: #60a5fa;
            --border-primary: #475569;
            --border-secondary: #64748b;
            --shadow-primary: rgba(0, 0, 0, 0.3);
            --shadow-secondary: rgba(0, 0, 0, 0.2);
            --gradient-from: #4338ca;
            --gradient-to: #7c3aed;
        }

        /* Base Styles */
        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .bg-primary { background-color: var(--bg-primary); }
        .bg-secondary { background-color: var(--bg-secondary); }
        .bg-tertiary { background-color: var(--bg-tertiary); }
        .bg-accent { background-color: var(--bg-accent); }
        .text-primary { color: var(--text-primary); }
        .text-secondary { color: var(--text-secondary); }
        .text-accent { color: var(--text-accent); }
        .border-primary { border-color: var(--border-primary); }
        .border-secondary { border-color: var(--border-secondary); }

        .gradient-bg {
            background: linear-gradient(135deg, var(--gradient-from) 0%, var(--gradient-to) 100%);
        }

        .card-shadow {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-primary);
            box-shadow: 0 10px 25px var(--shadow-primary);
            transition: all 0.3s ease;
        }

        .card-shadow:hover {
            box-shadow: 0 15px 35px var(--shadow-primary);
            transform: translateY(-2px);
        }

        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
            background-color: var(--bg-secondary);
            border-right: 1px solid var(--border-primary);
        }

        .content-transition {
            transition: margin-left 0.3s ease-in-out;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring-circle {
            transition: stroke-dasharray 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        .notification-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .nav-item {
            transition: all 0.2s ease-in-out;
            color: var(--text-secondary);
        }

        .nav-item:hover {
            transform: translateX(4px);
            background-color: var(--bg-tertiary);
            color: var(--text-primary);
        }

        .nav-item.active {
            background-color: #3b82f6;
            color: white;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Theme Toggle Button */
        .theme-toggle {
            position: relative;
            width: 60px;
            height: 30px;
            background-color: var(--bg-tertiary);
            border-radius: 15px;
            border: 1px solid var(--border-primary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            background-color: var(--bg-secondary);
            border-radius: 50%;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 4px var(--shadow-secondary);
        }

        [data-theme="dark"] .theme-toggle::before {
            transform: translateX(28px);
        }

        .theme-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            transition: opacity 0.3s ease;
        }

        .theme-icon.sun {
            left: 6px;
            color: #fbbf24;
        }

        .theme-icon.moon {
            right: 6px;
            color: #60a5fa;
        }

        [data-theme="light"] .theme-icon.moon,
        [data-theme="dark"] .theme-icon.sun {
            opacity: 0.3;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-tertiary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-secondary);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-secondary);
        }

        /* Input and Form Styles */
        input, select, textarea {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-primary);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Button Styles */
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: var(--bg-tertiary);
            color: var(--text-primary);
            border: 1px solid var(--border-primary);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: var(--bg-accent);
        }

        /* Table Styles */
        table {
            background-color: var(--bg-secondary);
        }

        th {
            background-color: var(--bg-tertiary);
            color: var(--text-primary);
        }

        tr:hover {
            background-color: var(--bg-tertiary);
        }

        /* Chart Styles */
        .chart-container {
            background-color: var(--bg-secondary);
            border-radius: 8px;
            padding: 1rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .text-3xl {
                font-size: 1.875rem;
            }

            .p-6 {
                padding: 1rem;
            }
        }

        /* Print Styles */
        @media print {
            .sidebar,
            .nav,
            button {
                display: none !important;
            }

            .content-transition {
                margin-left: 0 !important;
            }
        }

        /* Enhanced Animations */
        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .slide-up {
            animation: slideUp 0.4s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Progress Bar Animations */
        .progress-bar {
            transition: width 0.8s ease-in-out;
        }

        /* Notification Styles */
        .notification {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-primary);
            box-shadow: 0 4px 12px var(--shadow-primary);
        }


        .animate-fade-in {
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        
        .logo i {
            font-size: 24px;
            margin-right: 10px;
        }
        
        .logo h2 {
            font-size: 18px;
            font-weight: 600;
        }
        
        .user-info {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .nav-menu {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .nav-link i {
            margin-right: 12px;
            width: 20px;
        }
        
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 20px;
        }
        
        .header {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: between;
            align-items: center;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
        }
        
        .search-filter {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .search-box {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .filter-select {
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            background: white;
            min-width: 150px;
        }
        
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .job-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }
        
        .company-logo {
            width: 50px;
            height: 50px;
            background: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #667eea;
        }
        
        .job-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #1e293b;
        }
        
        .company-name {
            color: #64748b;
            font-size: 14px;
        }
        
        .job-meta {
            display: flex;
            gap: 15px;
            margin: 15px 0;
            font-size: 14px;
            color: #64748b;
        }
        
        .job-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .job-description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .tag {
            background: #f1f5f9;
            color: #475569;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        
        .job-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a67d8;
        }
        
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 1px solid #667eea;
        }
        
        .btn-outline:hover {
            background: #667eea;
            color: white;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #64748b;
            font-size: 14px;
        }
        
    </style>
</head>

<body class="bg-primary">
    <!-- Top Navigation Bar -->
    <nav class="bg-secondary shadow-lg fixed w-full top-0 z-50 border-b border-primary">
        <!-- Ganti max-w-7xl mx-auto jadi w-full px-4 -->
        <div class="w-full px-4">
            <div class="flex justify-between items-center h-16">
                
                <!-- KIRI: Logo dan Brand -->
                <div class="flex items-center space-x-4">
                    <button id="sidebarToggle" class="lg:hidden text-secondary hover:text-primary">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-3">
                         <div class="p-2">
                            <img src="{{ asset('img/owl1.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                        </div>

                        <div>
                            <h1 class="text-xl font-bold text-primary">Peta Cita</h1>
                            <p class="text-xs text-secondary">Your Future Starts Here</p>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Theme Toggle + Profile -->
                <div class="flex items-center space-x-6">
                    <!-- Theme Toggle -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-secondary">Theme:</span>
                        <div id="themeToggle" class="theme-toggle">
                            <i class="fas fa-sun theme-icon sun"></i>
                            <i class="fas fa-moon theme-icon moon"></i>
                        </div>
                    </div>

                    <!-- Saved -->
                    <div class="relative">
                        <button class="text-secondary hover:text-primary relative">
                            <a href="{{ route('saved.index') }}" class="fas fa-bookmark text-secondary text-lg cursor-pointer" title="Lihat Saved Jobs"></a>
                            <span class="notification-badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="text-secondary hover:text-primary relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="notification-badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </button>
                    </div>

                    <!-- User Menu (Hover Based) -->
                <div class="relative group">
                    <div class="flex items-center space-x-2 text-secondary hover:text-primary cursor-pointer">
                        @php
                        use Illuminate\Support\Facades\Auth;
                        $user = Auth::user();
                        $initials = collect(explode(' ', $user->nama))
                            ->take(2)
                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                            ->implode('');
                    @endphp

                        <div class="h-8 w-8 rounded-full bg-primary/10 text-primary text-xs flex items-center justify-center font-semibold border-2 border-primary">
                            {{ $initials }}
                        </div>

                        <span class="hidden md:block text-sm font-medium">{{ $user->nama }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-secondary rounded-md shadow-lg py-1 z-50 border border-primary hidden group-hover:block animate-fade-in">
                        <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-tertiary hover:text-primary">
                            <i class="fas fa-user mr-2"></i>My Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-tertiary hover:text-primary">
                            <i class="fas fa-info-circle mr-2"></i>About Us
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-tertiary hover:text-primary">
                            <i class="fas fa-question-circle mr-2"></i>Help & Support
                        </a>
                        <hr class="my-1 border-primary">
                        <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-tertiary hover:text-primary">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </nav>
          


        

     <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>


     <!-- Sidebar -->
   @include('layouts.sidebar')
    @yield('content')
    @include('partials.alert')
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
        setTimeout(() => {
        const flash = document.getElementById('flash-message');
        if (flash) {
            flash.remove();
        }
    }, 3000); // 3 detik
    </script>
</body>
</html>

    