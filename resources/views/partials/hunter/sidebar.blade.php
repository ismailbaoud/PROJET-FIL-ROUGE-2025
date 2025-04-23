<aside class="w-64 text-black h-screen fixed flex flex-col ">
    <div class="p-6 text-center">
        <h1 class="text-2xl font-bold tracking-wide">HappyHunt</h1>
    </div>

    <nav class="flex-1 px-4 py-4 flex flex-col space-y-4">
        <div class="space-y-3">
            <a href="/ht/dashboard"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-900 bg-gray-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-home text-gray-700"></i>
                <span>Dashboard</span>
            </a>

            <a href="/ht/programs"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-briefcase text-gray-700"></i>
                <span>All Programs</span>
            </a>

            <a href="/ht/myprograms"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-briefcase text-gray-700"></i>
                <span>My Programs</span>
            </a>


            <a href="/ht/reports"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-clipboard-list text-gray-700"></i>
                <span>Reports</span>
            </a>

            <a href="{{ route('leaderBoard') }}"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-wallet text-gray-700"></i>
                <span>leaderboard</span>
            </a>

            <a href="/ht/settings/{{Auth::id()}}"
                class="flex items-center gap-4 px-5 py-4 text-sm font-medium text-gray-700 bg-gray-50 rounded-xl shadow-md hover:bg-gray-100 hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                <i class="fas fa-cogs text-gray-700"></i>
                <span>settings</span>
            </a>

            <a>
                <form method="POST" action="{{ route('logout') }}"
                    class="flex text-white  items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </a>
        </div>
    </nav>
</aside>
