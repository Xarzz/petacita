@if(session('success') || session('info') || session('error'))
    <div 
        id="toast-message" 
        class="fixed top-5 right-5 z-50 max-w-xs w-full rounded-lg shadow-lg overflow-hidden transform translate-x-full opacity-0 transition-all duration-500 ease-out"
    >
        @if(session('success'))
            <div class="flex items-center bg-green-500 px-4 py-3 border-l-4 border-green-700">
                <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('info'))
            <div class="flex items-center bg-blue-500 px-4 py-3 border-l-4 border-blue-700">
                <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center bg-red-500 px-4 py-3 border-l-4 border-red-700">
                <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <script>
        const toast = document.getElementById('toast-message');
        if (toast) {
            // Animasi masuk
            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 100);

            // Hilang setelah 3 detik
            setTimeout(() => {
                toast.classList.remove('translate-x-0', 'opacity-100');
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    </script>
@endif
