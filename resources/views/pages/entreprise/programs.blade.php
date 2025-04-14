@extends('layouts.app')


@Section('main')
    <div class="flex h-screen ">
        @include('partials.entreprise.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.entreprise.header')
            <!-- Main Content Area -->
            <main class="flex-1 p-6 overflow-auto bg-gradient-to-r from-white via-white via-5% to-[#E8F5E9]">
                <div class="max-w-7xl mx-auto">
                    <!-- Enterprise Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <div class="h-16 w-16 rounded-full bg-blue-50 flex items-center justify-center mr-4 shadow-sm">
                                <span class="text-xl font-bold text-blue-600">MS</span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-900">Microsoft Bug Bounty Programs</h2>
                                <p class="text-gray-500 mt-1">Manage your Microsoft security programs</p>
                            </div>
                        </div>
                        <button onclick="displayForm()"
                            class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
                            Create New Program
                        </button>
                    </div>

                    {{-- create programes --}}
                    <section id="displayForm" class="hidden mb-10">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Add New Program</h2>
                        <form action="/create" method="POST" class="bg-white shadow rounded-lg p-6 space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Program Name</label>
                                <input type="text" name="title" id="name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="min_reward" class="block text-sm font-medium text-gray-700">Min
                                        Reward</label>
                                    <input type="number" name="min_reward" id="min_reward"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required>
                                </div>
                                <div>
                                    <label for="max_reward" class="block text-sm font-medium text-gray-700">Max
                                        Reward</label>
                                    <input type="number" name="max_reward" id="max_reward"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create
                                    Program</button>
                            </div>
                        </form>
                    </section>
                    <!-- Program Controls -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-6 flex flex-wrap gap-4 items-center justify-between">
                        <div class="flex gap-3">
                            <select
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                                <option>All Programs</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Draft</option>
                            </select>
                            <select
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                                <option>Sort by: Newest</option>
                                <option>Highest Bounty</option>
                                <option>Most Reports</option>
                                <option>Recently Updated</option>
                            </select>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                                Export
                            </button>
                            <button
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                                Bulk Actions
                            </button>
                        </div>
                    </div>

                    <!-- Programs Table -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Program Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reward Range
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reports
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Last Updated
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($programs as $program)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{$program->title}}</div>
                                                <div class="text-xs text-gray-500">{{$program->description}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    @php
                                    $colors = [
                                        'en_attente' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'En attente'],
                                        'actif' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Actif'],
                                        'inactif' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Inactif'],
                                    ];
                                    $status = $colors[$program->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'label' => $program->status];
                                    @endphp
                                                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $status['bg'] }} {{ $status['text'] }}">
                                            {{ $status['label'] }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        $500 - $250,000
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        243
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Mar 15, 2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900">Edit</button>
                                            <button class="text-gray-600 hover:text-gray-900">Pause</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span
                                class="font-medium">12</span> programs
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </button>
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function displayForm() {
            const form = document.getElementById("displayForm");
            if (form.classList.contains("hidden")) {
                form.classList.remove("hidden");
                form.classList.add("flex", "flex-col");
            } else {
                form.classList.add("hidden");
                form.classList.remove("flex", "flex-col");
            }
        }
    </script>
@endsection
