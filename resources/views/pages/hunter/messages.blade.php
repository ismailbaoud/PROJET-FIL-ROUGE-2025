@extends('layouts.app')


@Section('main')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-[230px] border-r border-mediumGray flex flex-col">
          <div class="p-6 font-bold text-lg">HappyHunt</div>
    
          @include('partials.hunter.sidebar')
    
        </div>

    <!-- Main Content -->
    <div class="flex-1 bg-lightGray">
        <!-- Header -->
        <header class="bg-white p-4 border-b border-mediumGray">
            <div class="max-w-5xl mx-auto">
                <input type="text" placeholder="Search messages..."
                    class="w-full max-w-md px-4 py-2 rounded-md bg-lightGray border-0 focus:outline-none focus:ring-1 focus:ring-darkBlue" />
            </div>
        </header>

        <!-- Content -->
        <main class="max-w-5xl mx-auto p-6">
            <!-- Messages Section -->
            <h1 class="text-2xl font-bold text-darkGray mb-4">Messages</h1>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="border-b">
                    <div class="px-4 py-3 flex items-center justify-between">
                        <h2 class="text-lg font-semibold">Inbox</h2>
                        <button class="text-green hover:text-green-600">
                            ➕ New Message
                        </button>
                    </div>
                </div>
                <div class="overflow-auto max-h-[500px]">
                    <ul>
                        <li class="border-b hover:bg-lightGray">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold">Alice Smith</span>
                                    <span class="text-sm text-gray-500">2 hours ago</span>
                                </div>
                                <p class="text-gray-700 mt-2">Hey! I found a vulnerability in your program. Let's discuss
                                    it...</p>
                            </div>
                        </li>
                        <li class="border-b hover:bg-lightGray">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold">Bob Johnson</span>
                                    <span class="text-sm text-gray-500">1 day ago</span>
                                </div>
                                <p class="text-gray-700 mt-2">Could you clarify the bounty amount for this program?</p>
                            </div>
                        </li>
                        <li class="border-b hover:bg-lightGray">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold">Charlie Lee</span>
                                    <span class="text-sm text-gray-500">3 days ago</span>
                                </div>
                                <p class="text-gray-700 mt-2">Is the red team challenge still open?</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    </div>
@endsection
