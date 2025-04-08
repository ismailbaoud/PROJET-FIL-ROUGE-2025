<aside class="w-64 text-black h-screen fixed flex flex-col ">
    <!-- Logo / Title -->
    <div class="p-6 text-center">
        <h1 class="text-2xl font-bold tracking-wide">HappyHunt</h1>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="flex-1 px-4 py-4 flex flex-col space-y-4">
        <div class="space-y-3">
            <!-- Dashboard -->
            <a href="/ht/dashboard" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-900 bg-gray-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-home text-gray-700"></i> <!-- Dashboard Icon -->
                <span>Dashboard</span>
            </a>

            <!-- My Programs -->
            <a href="/ht/programs" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-briefcase text-gray-700"></i> <!-- Programs Icon -->
                <span>My Programs</span>
            </a>

            <!-- Reports -->
            <a href="/ht/reports" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-clipboard-list text-gray-700"></i> <!-- Reports Icon -->
                <span>Reports</span>
            </a>

            <!-- leaderboard -->
            <a href="/ht/leaderboard" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-wallet text-gray-700"></i> <!-- Payments Icon -->
                <span>leaderboard</span>
            </a>

            <!-- messages -->
            <a href="/ht/messages" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-cogs text-gray-700"></i> <!-- Settings Icon -->
                <span>messages</span>
            </a>

             <!-- Settings -->
             <a href="/ht/settings" class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-cogs text-gray-700"></i> <!-- Settings Icon -->
                <span>settings</span>
            </a>

            <!-- logout -->
             <a>
                <form method="POST" action="{{ route('logout') }}" class="flex text-white  items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                    @csrf
                    <button type="submit">Logout</button>
                </form>  
            </a>
        </div>
    </nav>
</aside>
