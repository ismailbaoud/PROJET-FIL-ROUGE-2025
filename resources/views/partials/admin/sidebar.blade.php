<nav class="w-64 bg-white text-white h-auto">
    <div class="flex items-center justify-center py-6">
        <h2 class="text-xl text-black font-semibold">Bug Bounty</h2>
    </div>
    <ul class="space-y-4 px-4">
        <li>
            <a href="/dm/dashboard" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-tachometer-alt text-xl"></i>
                <span class="ml-3">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/dm/users" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-users text-xl"></i>
                <span class="ml-3">Utilisateurs</span>
            </a>
        </li>
        <li>
            <a href="/dm/programs" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-cogs text-xl"></i>
                <span class="ml-3">Programmes</span>
            </a>
        </li>
        <li>
            <a href="/dm/reports" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-clipboard-list text-xl"></i>
                <span class="ml-3">Rapports</span>
            </a>
        </li>
        <li>
            <a href="/dm/transactions" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-exchange-alt text-xl"></i>
                <span class="ml-3">Transactions</span>
            </a>
        </li>
        <li>
            <a href="/dm/green-rooms" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-tree text-xl"></i>
                <span class="ml-3">Green Rooms</span>
            </a>
        </li>
        <li>
            <a href="/dm/logs" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-file-alt text-xl"></i>
                <span class="ml-3">Logs</span>
            </a>
        </li>
        <li>
            <a href="/dm/settings" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                <i class="fas fa-cogs text-xl"></i>
                <span class="ml-3">Paramètres</span>
            </a>
        </li>
        <li>
                <form method="POST" action="{{ route('logout') }}" class="flex items-center p-4 rounded-lg bg-gray-800 shadow-md hover:shadow-lg hover:bg-gray-700 transition duration-300">
                    @csrf
                    <button type="submit">Logout</button>
                </form>  
        </li>
    </ul>
</nav>
