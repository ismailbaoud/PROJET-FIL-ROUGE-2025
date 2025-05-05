@extends('layouts.app')

@section('main')
    <div class="flex h-screen  bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.entreprise.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')
            <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700 ">
                <div class="w-[100%] mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                        <div>
                            <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Vulnerability Reports Dashboard
                            </h1>
                            <p class="text-gray-400 mt-1">Manage and triage security reports across all programs</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <button class="flex items-center gap-2 px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg hover:bg-gray-600 transition-all duration-300 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-4 mb-6">
                        <form method="GET" id="filterForm">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div class="flex flex-wrap gap-3">
                                    <div class="relative">
                                        <select name="program_id" onchange="document.getElementById('filterForm').submit()"
                                            class="appearance-none pl-3 pr-8 py-2 bg-gray-700 border border-gray-600 rounded-lg text-sm text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 w-full md:w-48">
                                            <option value="">All Programs</option>
                                            @foreach ($reports->pluck('program')->unique('id') as $program)
                                                @if ($program)
                                                    <option value="{{ $program->id }}" {{ request('program_id') == $program->id ? 'selected' : '' }}>
                                                        {{ $program->title }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <select name="severity" onchange="document.getElementById('filterForm').submit()"
                                            class="appearance-none pl-3 pr-8 py-2 bg-gray-700 border border-gray-600 rounded-lg text-sm text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 w-full md:w-48">
                                            <option value="">All Severities</option>
                                            <option value="Low" {{ request('severity') == 'Low' ? 'selected' : '' }}>Low</option>
                                            <option value="Medium" {{ request('severity') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="High" {{ request('severity') == 'High' ? 'selected' : '' }}>High</option>
                                            <option value="Critical" {{ request('severity') == 'Critical' ? 'selected' : '' }}>Critical</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <select name="status" onchange="document.getElementById('filterForm').submit()"
                                            class="appearance-none pl-3 pr-8 py-2 bg-gray-700 border border-gray-600 rounded-lg text-sm text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 w-full md:w-48">
                                            <option value="">All Statuses</option>
                                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="triaged" {{ request('status') == 'triaged' ? 'selected' : '' }}>Triaged</option>
                                            <option value="duplicate" {{ request('status') == 'duplicate' ? 'selected' : '' }}>Duplicate</option>
                                            <option value="informative" {{ request('status') == 'informative' ? 'selected' : '' }}>Informative</option>
                                            <option value="not_applicable" {{ request('status') == 'not_applicable' ? 'selected' : '' }}>Not Applicable</option>
                                            <option value="not_reproducible" {{ request('status') == 'not_reproducible' ? 'selected' : '' }}>Not Reproducible</option>
                                            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                            <option value="wont_fix" {{ request('status') == 'wont_fix' ? 'selected' : '' }}>Won't Fix</option>
                                            <option value="spam" {{ request('status') == 'spam' ? 'selected' : '' }}>Spam</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-full md:w-64">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search reports..."
                                        class="w-full pl-10 pr-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                                        onkeydown="if(event.key === 'Enter'){ this.form.submit(); }">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-4 hover:shadow-md transition-all">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-400">Total Reports</p>
                                    <p class="mt-1 text-2xl font-bold text-white">{{ $reports->total() }}</p>
                                </div>
                                <div class="h-10 w-10 rounded-lg bg-blue-600/20 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-4 hover:shadow-md transition-all">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-400">Pending Review</p>
                                    <p class="mt-1 text-2xl font-bold text-blue-400">
                                        {{ $reports->where('status', 'New')->count() + $reports->where('status', 'Triaging')->count() }}
                                    </p>
                                </div>
                                <div class="h-10 w-10 rounded-lg bg-blue-600/20 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-4 hover:shadow-md transition-all">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-400">Accepted</p>
                                    <p class="mt-1 text-2xl font-bold text-blue-400">{{ $reports->where('status', 'Accepted')->count() }}</p>
                                </div>
                                <div class="h-10 w-10 rounded-lg bg-blue-600/20 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 p-4 hover:shadow-md transition-all">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-400">Total Bounties</p>
                                    <p class="mt-1 text-2xl font-bold text-white">$ {{ $profile->rewards }}</p>
                                </div>
                                <div class="h-10 w-10 rounded-lg bg-blue-600/20 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-600">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-600">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Report ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Vulnerability</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Program</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Severity</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Reported</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Bounty</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Pointes</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Report by</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-600">
                                    @foreach ($reports as $report)
                                        <tr class="hover:bg-gray-700/50 transition-all duration-300">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-200">{{ $report->id }}</td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-semibold text-white">{{ $report->title }}</div>
                                                <div class="text-xs text-gray-400 mt-1">{{ $report->type }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-5 w-5 rounded-full bg-blue-600/20 flex items-center justify-center mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm text-white">{{ $report->program->title ?? 'Unknown' }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $severity = match ($report->severity) {
                                                        'Critical' => ['label' => 'Critical', 'bg' => 'bg-red-600/20', 'text' => 'text-red-400'],
                                                        'High' => ['label' => 'High', 'bg' => 'bg-orange-600/20', 'text' => 'text-orange-400'],
                                                        'Medium' => ['label' => 'Medium', 'bg' => 'bg-yellow-600/20', 'text' => 'text-yellow-400'],
                                                        default => ['label' => 'Low', 'bg' => 'bg-blue-600/20', 'text' => 'text-blue-400'],
                                                    };
                                                @endphp
                                                <span class="px-2 py-1 inline-flex text-xs leading-4 font-bold rounded-full {{ $severity['bg'] }} {{ $severity['text'] }} uppercase">
                                                    {{ $report->severity }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $statusStyles = match ($report->status) {
                                                        'New' => 'bg-gray-600/20 text-gray-200',
                                                        'Triaging' => 'bg-blue-600/20 text-blue-400',
                                                        'Accepted' => 'bg-blue-600/20 text-blue-400',
                                                        'Resolved' => 'bg-purple-600/20 text-purple-400',
                                                        'Rejected' => 'bg-red-600/20 text-red-400',
                                                        default => 'bg-gray-600/20 text-gray-200',
                                                    };
                                                @endphp
                                                <span class="px-2 py-1 inline-flex text-xs leading-4 font-medium rounded-full {{ $statusStyles }}">
                                                    {{ $report->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $report->created_at->format('M d, Y') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-400">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $report->reward ? '$' . number_format($report->reward, 0) : 'Pending' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-400">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $report->pointe ? number_format($report->pointe, 0) : 'Pending' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('hunter.profile', $report->user->id) }}"
                                                    class="flex items-center justify-end gap-2 hover:underline">
                                                    <img src="{{ asset('storage/' . ($report->user->profile->content_vusial ?? 'default.png')) }}"
                                                        alt="User Avatar" class="w-8 h-8 rounded-full object-cover shadow" />
                                                    <span class="text-white font-semibold">{{ $report->user->userName ?? 'Unknown' }}</span>
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end space-x-3">
                                                    <a href="{{ route('hunter_report_details', $report->id) }}"
                                                        class="text-blue-400 hover:text-blue-300 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                    <form action="{{ route('entreprise_report_update', $report->id) }}" method="POST" id="status-form-{{ $report->id }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status"
                                                            class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                                                            onchange="document.getElementById('status-form-{{ $report->id }}').submit();">
                                                            <option value="new" {{ $report->status == 'new' ? 'selected' : '' }}>New</option>
                                                            <option value="triaged" {{ $report->status == 'triaged' ? 'selected' : '' }}>Triaged</option>
                                                            <option value="duplicate" {{ $report->status == 'duplicate' ? 'selected' : '' }}>Duplicate</option>
                                                            <option value="informative" {{ $report->status == 'informative' ? 'selected' : '' }}>Informative</option>
                                                            <option value="not_applicable" {{ $report->status == 'not_applicable' ? 'selected' : '' }}>Not Applicable</option>
                                                            <option value="not_reproducible" {{ $report->status == 'not_reproducible' ? 'selected' : '' }}>Not Reproducible</option>
                                                            <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                            <option value="wont_fix" {{ $report->status == 'wont_fix' ? 'selected' : '' }}>Won't Fix</option>
                                                            <option value="spam" {{ $report->status == 'spam' ? 'selected' : '' }}>Spam</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between mt-6">
                        <div class="text-sm text-gray-400 mb-4 sm:mb-0">
                            Showing <span class="font-medium">{{ $reports->firstItem() }}</span> to <span class="font-medium">{{ $reports->lastItem() }}</span> of <span class="font-medium">{{ $reports->total() }}</span> reports
                        </div>
                        <div class="flex space-x-2">
                            {{ $reports->appends(request()->query())->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection