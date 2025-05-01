<div class="fixed top-4 left-4 z-50 md:hidden">
    <button id="burgerButton" class="p-3 rounded-full bg-white shadow-md border border-gray-300 hover:shadow-lg hover:bg-gray-100 transition-all duration-300">
      <i class="fas fa-bars text-2xl text-gray-700"></i>
    </button>
</div>
  

<aside id="sidebar" class="w-64 bg-transparant h-screen fixed flex flex-col transition-transform duration-300 transform md:translate-x-0 bg-translate-x-full md:static">
    <!-- Logo / Title Section -->
    <div class="p-8 border-b border-gray-200 flex items-center justify-center">
        <img src="{{ asset('images/happyhunt.png') }}" alt="HappyHunt Logo" class="h-52 rounded-lg object-contain">
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 flex flex-col space-y-4">
        <a href="{{ route('showEntrepriseDashboard') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-xl border border-2 border-black hover:bg-[#E8F5E9] transition-all duration-300">
            <i class="fas fa-home text-gray-700"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('entreprisePrograms') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-medium text-gray-800 bg-gray-50 rounded-xl border border-2 border-black hover:bg-[#E8F5E9] transition-all duration-300">
            <i class="fas fa-briefcase text-gray-700"></i>
            <span>Programs</span>
        </a>

        <a href="{{ route('reportEntreprise') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-medium text-gray-800 bg-gray-50 rounded-xl border border-2 border-black hover:bg-[#E8F5E9] transition-all duration-300">
            <i class="fas fa-clipboard-list text-gray-700"></i>
            <span>Reports</span>
        </a>

        <a href="{{ route('entrepriseTransactions') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-medium text-gray-800 bg-gray-50 rounded-xl border border-2 border-black hover:bg-[#E8F5E9] transition-all duration-300">
            <i class="fas fa-clipboard-list text-gray-700"></i>
            <span>Transactions</span>
        </a>

        <a href="{{ route('settingsEntreprise') }}"
            class="flex items-center gap-4 px-5 py-3 text-sm font-medium text-gray-800 bg-gray-50 rounded-xl border border-2 border-black hover:bg-[#E8F5E9] transition-all duration-300">
            <i class="fas fa-cogs text-gray-700"></i>
            <span>Settings</span>
        </a>
    </nav>

    <!-- Logout Section -->
    <div class="px-4 py-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 transition duration-300 shadow">
                <i class="fas fa-sign-out-alt"></i>
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