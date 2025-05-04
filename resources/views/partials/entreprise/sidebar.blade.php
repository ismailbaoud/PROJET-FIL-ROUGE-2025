<div class="fixed top-4 left-4 z-50 md:hidden">
    <button id="burgerButton" class="p-3 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
        <i class="fas fa-bars text-xl"></i>
    </button>
</div>

<aside id="sidebar" class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 h-screen fixed flex flex-col transition-transform duration-500 transform md:translate-x-0 -translate-x-full md:static">
    <!-- Logo / Title Section -->
    <div class="py-1 bg-gradient-to-b from-gray-800 to-gray-900 border-b border-white flex items-center justify-center">
        <img src="{{ asset('images/happyhunt.png') }}" alt="HappyHunt Logo" class="h-16 rounded-xl object-contain transform hover:scale-105 transition-transform duration-300">
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 flex flex-col space-y-2">
        <a href="{{ route('showEntrepriseDashboard') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl bg-gray-700/50 hover:bg-blue-600 hover:text-white transition-all duration-300">
            <i class="fas fa-home w-5 text-blue-400"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('entreprisePrograms') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300">
            <i class="fas fa-briefcase w-5 text-blue-400"></i>
            <span>Programs</span>
        </a>

        <a href="{{ route('reportEntreprise') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300">
            <i class="fas fa-clipboard-list w-5 text-blue-400"></i>
            <span>Reports</span>
        </a>

        <a href="{{ route('entrepriseTransactions') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300">
            <i class="fas fa-clipboard-list w-5 text-blue-400"></i>
            <span>Transactions</span>
        </a>

        <a href="{{ route('settingsEntreprise') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300">
            <i class="fas fa-cogs w-5 text-blue-400"></i>
            <span>Settings</span>
        </a>
    </nav>

    <!-- Logout Section -->
    <div class="px-4 py-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-3 px-4 py-3 text-sm font-semibold text-gray-200 rounded-xl bg-gray-700/50 hover:bg-red-600 hover:text-white transition-all duration-300">
                <i class="fas fa-sign-out-alt text-red-400"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<script>
    const burgerButton = document.getElementById('burgerButton');
    const sidebar = document.getElementById('sidebar');

    burgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
</script>