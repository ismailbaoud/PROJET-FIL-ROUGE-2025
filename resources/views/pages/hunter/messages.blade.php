@extends('layouts.app')


@Section('main')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('partials.hunter.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.hunter.header')

            <!-- Content -->
            <main class="w-[70%] mx-auto p-6">
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
                                    <p class="text-gray-700 mt-2">Hey! I found a vulnerability in your program. Let's
                                        discuss
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
