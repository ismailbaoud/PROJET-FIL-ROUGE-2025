<!-- Burger Button (Mobile) -->
<div class="fixed top-4 left-4 z-50 md:hidden">
    <button id="burgerButton"
        class="p-3 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
        <i class="fas fa-bars text-xl"></i>
    </button>
</div>

<!-- Sidebar -->
<aside id="sidebar"
    class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 h-screen fixed flex flex-col transition-transform duration-500 transform md:translate-x-0 -translate-x-full md:static z-40">
    
    <!-- Logo Section -->
    <div class="p-8 bg-gradient-to-b from-gray-800 to-gray-900  border-b border-gray-700 flex items-center justify-center">
        <img src="{{ asset('images/happyhunt.png') }}" alt="HappyHunt Logo"
            class="h-16 py-1 rounded-xl object-contain transform hover:scale-105 transition-transform duration-300">
    </div>

    <!-- Navigation -->
    <nav class="text-white shadow-2xl">
        <div class="flex items-center justify-center py-6 border-b border-gray-700">
            <h2 class="text-xl font-semibold text-gray-200">Bug Bounty</h2>
        </div>
        <ul class="space-y-2 px-4 py-6">
            <li>
                <a href="/dm/dashboard"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl bg-gray-700/50 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-tachometer-alt w-5 text-blue-400"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/dm/users"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-users w-5 text-blue-400"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="/dm/programs"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-cogs w-5 text-blue-400"></i>
                    <span>Programmes</span>
                </a>
            </li>
            <li>
                <a href="/dm/reports"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-clipboard-list w-5 text-blue-400"></i>
                    <span>Rapports</span>
                </a>
            </li>
            <li>
                <a href="/dm/transactions"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-exchange-alt w-5 text-blue-400"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li>
                <a href="/dm/settings"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    <i class="fas fa-cogs w-5 text-blue-400"></i>
                    <span>Paramètres</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}"
                    class="flex items-center gap-4 px-5 py-3 text-sm font-semibold text-gray-200 rounded-xl bg-gray-700/50 hover:bg-red-600 hover:text-white transition-all duration-300 shadow-sm">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3">
                        <i class="fas fa-sign-out-alt text-red-400"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Sidebar Toggle Script -->
<script>
    document.getElementById('burgerButton').addEventListener('click', () => {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>
