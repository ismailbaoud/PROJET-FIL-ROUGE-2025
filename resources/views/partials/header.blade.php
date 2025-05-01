<header class="max-w-screen px-4 flex items-center justify-between bg-white fixed z-50 left-0 right-0 shadow-sm">
    <div class="font-bold text-2xl">
        <a href="/">          <img src="{{ asset('images/happyhunt.png') }}" alt="HappyHunt Logo" class="h-22 rounded-lg object-contain">
        </a>
    </div>

    <div class="md:hidden">
        <button id="menu-toggle" class="text-black focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div class="hidden md:flex items-center space-x-24">
        <nav class="flex items-center space-x-12">
            <a href="/" class="text-base font-medium hover:underline">Leaderboard</a>
            <a href="#about" class="text-base font-medium hover:underline">Hunting</a>
            <a href="#reports" class="text-base font-medium hover:underline">Reports</a>
        </nav>

        <div class="flex items-center space-x-4">
            <a href="{{ route('showLogin') }}"
                class="inline-flex items-center justify-center rounded-md border border-black bg-white px-4 py-2 text-sm font-medium text-black hover:bg-gray-100">
                Login
            </a>
            <a href="{{ route('showRegisterHunter') }}"
                class="inline-flex items-center justify-center rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-black/90">
                Join the Hunt
            </a>
        </div>
    </div>
</header>

<div id="mobile-menu" class="hidden md:hidden bg-white px-4 pt-4 pb-2 shadow-md fixed top-16 left-0 right-0 z-40">
    <nav class="flex flex-col space-y-4">
        <a href="/" class="text-base font-medium hover:underline">Leaderboard</a>
        <a href="#" class="text-base font-medium hover:underline">Reports</a>
        <a href="#" class="text-base font-medium hover:underline">About</a>
        <a href="{{ route('showLogin') }}"
            class="inline-flex items-center justify-center rounded-md border border-black bg-white px-4 py-2 text-sm font-medium text-black hover:bg-gray-100">
            Login
        </a>
        <a href="{{ route('showRegisterHunter') }}"
            class="inline-flex items-center justify-center rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-black/90">
            Join the Hunt
        </a>
    </nav>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
