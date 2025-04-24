<aside class="w-64 bg-gray-50 h-screen fixed flex flex-col">
    <!-- Logo Section -->
    <div class="p-2 border-b border-gray-200 flex items-center justify-center">
        <img src="/images/3b8729e3-de16-4307-bc78-f92b553144e5-removebg-preview.png" alt="HappyHunt Logo" class="h-52 object-contain">
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-3 py-4 flex flex-col">
        <div class="space-y-1">
            <a href="/ht/dashboard"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-home w-5 text-gray-500"></i>
                <span>Dashboard</span>
            </a>

            <a href="/ht/programs"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-briefcase w-5 text-gray-500"></i>
                <span>All Programs</span>
            </a>

            <a href="/ht/myprograms"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-folder-open w-5 text-gray-500"></i>
                <span>My Programs</span>
            </a>

            <a href="/ht/reports"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                <span>Reports</span>
            </a>

            <a href="{{ route('leaderBoard') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-trophy w-5 text-gray-500"></i>
                <span>Leaderboard</span>
            </a>

            <a href="/ht/settings/{{Auth::id()}}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 rounded-md
                       hover:bg-[#E8F5E9] hover:text-gray-900 transition-colors duration-200 border border-black">
                <i class="fas fa-cog w-5 text-gray-500"></i>
                <span>Settings</span>
            </a>
        </div>
    </nav>

    <!-- Bottom Section -->
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" 
                class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-md border border-black
                       hover:bg-gray-100 transition-colors duration-200">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>