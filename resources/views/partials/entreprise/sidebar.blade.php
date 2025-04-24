<aside class="w-64 bg-gray-50 text-black h-screen fixed flex flex-col">
    <!-- Logo / Title Section -->
    <div class="p-8 border-b border-gray-200 flex items-center justify-center">
        <img src="/images/3b8729e3-de16-4307-bc78-f92b553144e5-removebg-preview.png" alt="HappyHunt Logo" class="h-52 w-auto object-contain">
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
