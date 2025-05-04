@extends('layouts.app')

@section('main')
    <div class="min-h-screen flex bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.hunter.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.hunter.header')
            <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="max-w-7xl mx-auto">
                    <!-- Welcome Card -->
                    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-6 mb-8 flex items-center">
                        <div class="relative">
                            <div class="h-16 w-16 rounded-full bg-blue-500 flex items-center justify-center text-white text-xl font-bold mr-6 shadow-md">
                                {{ substr(Auth::user()->userName, 0, 2) }}
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white mb-1">Welcome back, {{ Auth::user()->userName }}</h1>
                            <div class="flex items-center text-gray-400">
                                <!-- Placeholder for additional content if needed -->
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-5 hover:shadow-md transition-all duration-300">
                            <div class="text-gray-400 text-sm font-medium mb-2">Total Reports</div>
                            <div class="text-3xl font-bold text-blue-400">{{ $totalReports }}</div>
                            <div class="mt-2 flex items-center text-xs text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-5 hover:shadow-md transition-all duration-300">
                            <div class="text-gray-400 text-sm font-medium mb-2">Validated Reports</div>
                            <div class="text-3xl font-bold text-blue-400">{{ $validatedReports }}</div>
                            <div class="mt-2 flex items-center text-xs text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-5 hover:shadow-md transition-all duration-300">
                            <div class="text-gray-400 text-sm font-medium mb-2">Total Earnings</div>
                            <div class="text-3xl font-bold text-blue-400">$ {{ Auth::user()->profile->rewards }}</div>
                            <div class="mt-2 flex items-center text-xs text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-5 hover:shadow-md transition-all duration-300">
                            <div class="text-gray-400 text-sm font-medium mb-2">Global Rank</div>
                            <div class="text-3xl font-bold text-white">#42</div>
                            <div class="mt-2 flex items-center text-xs text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Programs -->
                    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 mb-8 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-600 flex justify-between items-center">
                            <div>
                                <h2 class="text-xl font-bold text-white">Active Programs</h2>
                                <p class="text-sm text-gray-400 mt-1">Programs currently accepting vulnerability reports</p>
                            </div>
                            <a href="{{ route('programs') }}"
                                class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-300 text-sm shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Report Vulnerability
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-600">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Company</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Rewards</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-600">
                                    @foreach ($programs as $program)
                                        <tr class="hover:bg-gray-700/50 transition-all duration-300">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-white">{{ $program->entreprise->userName }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                                {{ $program->min_reward }} - {{ $program->max_reward }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 inline-flex text-xs leading-4 font-medium rounded-full bg-blue-600/20 text-blue-400">
                                                    {{ $program->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('hunter_report_details', $program->id) }}"
                                                    class="text-blue-400 hover:text-blue-300 transition-all duration-300">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recent Reports -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h2 class="text-xl font-bold text-white">Recent Reports</h2>
                                <p class="text-sm text-gray-400 mt-1">Your most recent vulnerability submissions</p>
                            </div>
                            <a href="{{ route('hunter_report_index') }}"
                                class="text-sm text-blue-400 hover:text-blue-300 transition-all duration-300">View All</a>
                        </div>
                        <div class="space-y-4">
                            @foreach ($reports as $report)
                                <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-5 hover:shadow-md transition-all duration-300">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="text-base font-medium text-white">{{ $report->title }}</h3>
                                        <span class="px-2 py-1 text-xs font-bold rounded-full
                                            {{ $report->severity == 'Critical' ? 'bg-red-600/20 text-red-400' : ($report->severity == 'High' ? 'bg-orange-600/20 text-orange-400' : ($report->severity == 'Medium' ? 'bg-yellow-600/20 text-yellow-400' : 'bg-blue-600/20 text-blue-400')) }}">
                                            {{ $report->severity }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-xs text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $report->time_diff }} • Under Review
                                        </div>
                                        <a href="{{ route('hunter_report_details', $report->id) }}"
                                            class="text-sm text-blue-400 hover:text-blue-300 transition-all duration-300">View Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection