@extends('layouts.app')

@section('main')
    <div class="min-h-screen flex">
        @include('partials.hunter.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.hunter.header')

            <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
                <div class="max-w-7xl mx-auto">
                    <!-- Welcome Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8 flex items-center">
                        <div class="relative">
                            <div
                                class="h-16 w-16 rounded-full bg-red-500
                                -600 flex items-center justify-center text-white text-xl font-bold mr-6 shadow-md">
                                CH
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 mb-1">Welcome back, {{ Auth::user()->userName }}</h1>
                            <div class="flex items-center text-gray-600">

                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                            <div class="text-gray-500 text-sm font-medium mb-2">Total Reports</div>
                            <div class="text-3xl font-bold text-red-500">{{ $totalReports }}</div>
                            <div class="mt-2 flex items-center text-xs text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                            <div class="text-gray-500 text-sm font-medium mb-2">Validated Reports</div>
                            <div class="text-3xl font-bold text-green-600">{{ $validatedReports }}</div>
                            <div class="mt-2 flex items-center text-xs text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                            <div class="text-gray-500 text-sm font-medium mb-2">Total Earnings</div>
                            <div class="text-3xl font-bold text-purple-600">$ {{ Auth::user()->profile->rewards }}</div>
                            <div class="mt-2 flex items-center text-xs text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                            <div class="text-gray-500 text-sm font-medium mb-2">Global Rank</div>
                            <div class="text-3xl font-bold text-gray-900">#42</div>
                            <div class="mt-2 flex items-center text-xs text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Programs -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Active Programs</h2>
                                <p class="text-sm text-gray-500 mt-1">Programs currently accepting vulnerability reports</p>
                            </div>
                            <a href="{{ route('programs') }}"
                                class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Report Vulnerability
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Company</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rewards</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($programs as $program)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $program->entreprise->userName }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $program->min_reward }} - {{ $program->max_reward }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 inline-flex text-xs leading-4 font-medium rounded-full bg-green-100 text-green-800">
                                                    {{ $program->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('hunter_report_details', $program->id) }}" class="text-red-500 hover:text-red-900">View</button>
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
                                <h2 class="text-xl font-bold text-gray-900">Recent Reports</h2>
                                <p class="text-sm text-gray-500 mt-1">Your most recent vulnerability submissions</p>
                            </div>
                            <a href="{{route('hunter_report_index')}}" class="text-sm text-red-500 hover:text-red-800">View All</a>
                        </div>
                        <div class="space-y-4">
                            <!-- Critical Report -->
                            @foreach ($reports as $report)
                                <div
                                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="text-base font-medium text-gray-900">{{$report->title}}</h3>
                                        <span
                                            class="px-2 py-1 bg-gray-100 text-black text-xs font-bold rounded-full"> {{ $report->severity }} </span>
                                        </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $report->time_diff }} • Under Review
                                        </div>
                                        <a href="{{ route('hunter_report_details',$report->id)}}" class="text-sm text-red-500 hover:text-red-800">View Details</a>
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
