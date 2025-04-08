@extends('layouts.app')


@Section('main')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('partials.hunter.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.hunter.header')

            <!-- Content -->
            <main class="w-[70%] mx-auto p-6">
                <!-- Leaderboard Table Section -->
                <h1 class="text-2xl font-bold text-darkGray mb-4">Leaderboard</h1>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full border-collapse">
                        <thead class="bg-mediumGray">
                            <tr>
                                <th class="p-3 text-left">Rank</th>
                                <th class="p-3 text-left">Hunter</th>
                                <th class="p-3 text-left">Points</th>
                                <th class="p-3 text-left">Country</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-lightGray">
                                <td class="p-3">1</td>
                                <td class="p-3">Alice Smith</td>
                                <td class="p-3">1,500</td>
                                <td class="p-3">USA</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500"> View</a>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-lightGray">
                                <td class="p-3">2</td>
                                <td class="p-3">Bob Johnson</td>
                                <td class="p-3">1,300</td>
                                <td class="p-3">UK</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500"> View</a>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-lightGray">
                                <td class="p-3">3</td>
                                <td class="p-3">Charlie Lee</td>
                                <td class="p-3">1,100</td>
                                <td class="p-3">Canada</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500"> View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Add New Hunter Button -->
                <div class="mt-6">
                    <a href="#" class="bg-green text-white px-4 py-2 rounded-md hover:bg-green-600">
                        ➕ Add New Hunter
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection
