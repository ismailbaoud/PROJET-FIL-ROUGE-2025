@extends('layouts.app')


@Section('main')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('partials.hunter.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.hunter.header')
            <!-- Content -->
            <main class="w-[70%] mx-auto p-6">
                <!-- Programs Table Section -->
                <h1 class="text-2xl font-bold text-darkGray mb-4">Bug Bounty Programs</h1>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full border-collapse">
                        <thead class="bg-mediumGray">
                            <tr>
                                <th class="p-3 text-left">Program Name</th>
                                <th class="p-3 text-left">Company</th>
                                <th class="p-3 text-left">Rewards</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-lightGray">
                                <td class="p-3">HackerOne 2025</td>
                                <td class="p-3">HackerOne</td>
                                <td class="p-3">$50,000</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded-md text-white bg-green">Open</span>
                                </td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500">✏️ Edit</a>
                                    <button class="text-red-500">🗑️ Delete</button>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-lightGray">
                                <td class="p-3">BugCrowd 2025</td>
                                <td class="p-3">BugCrowd</td>
                                <td class="p-3">$30,000</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded-md text-white bg-yellow">Pending</span>
                                </td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500">✏️ Edit</a>
                                    <button class="text-red-500">🗑️ Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection
