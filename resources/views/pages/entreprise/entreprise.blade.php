@extends('layouts.app')

@section('main')
    <div class="flex flex-col md:flex-row h-screen bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.entreprise.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')
            
            <main class="flex-1 text-center overflow-auto p-4 md:p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="max-w-7xl mx-auto mb-8 p-4 bg-gray-800 rounded-xl text-center border border-gray-600 shadow-lg">
                    <div>
                        <h1 class="text-2xl font-bold text-white flex items-center justify-center gap-2">
                            <i class="fas fa-shield-alt text-blue-400"></i>
                            Bug Bounty Command Center
                        </h1>
                        <p class="text-gray-400">
                            Welcome back, <span class="font-semibold text-white">{{ Auth::user()->userName }}</span>. 
                            <span class="hidden md:inline">
                                You have <span class="font-semibold text-blue-400">{{ $reports->count() }} new reports today</span> requiring attention.
                            </span>
                        </p>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto mb-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fas fa-bug text-blue-400"></i> Active Security Programs
                        </h2>
                    </div>
                    
                    <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-600">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-600">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider">Program</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">Reports</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">Rewards</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-600">
                                    @forelse ($programs as $program)
                                        <tr class="hover:bg-gray-700/50 transition-all duration-300">
                                            <td class="px-6 py-4">
                                                <div class="font-medium text-white">{{ $program->title }}</div>
                                                <div class="text-gray-400 text-xs">Created {{ $program->created_at->diffForHumans() }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-right text-sm font-medium text-gray-200">
                                                {{ $program->reports_count ?? 0 }}
                                            </td>
                                            <td class="px-6 py-4 text-right text-sm font-medium text-blue-400">
                                                {{ $program->reward_amount ?? '$0' }}
                                            </td>
                                            <td class="px-6 py-4 text-right text-sm font-medium">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $program->status == 'Active' ? 'bg-blue-600/20 text-blue-400' : 'bg-gray-600/20 text-gray-200' }}">
                                                    {{ $program->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                                                No active programs available.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fas fa-shield-virus text-blue-400"></i> Recent Vulnerability Reports
                        </h2>
                        <a href="{{ route('reportEntreprise') }}" class="text-sm font-medium text-gray-200 hover:text-blue-400 flex items-center gap-1 transition-all duration-300">
                            View all <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @forelse ($reports as $report)
                            <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 hover:shadow-xl transition-all duration-300">
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-start gap-3">
                                            <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-blue-400 mt-1">
                                                <i class="fas fa-user-secret"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-white">{{ $report->title }}</h3>
                                                <p class="text-gray-400 text-sm">Reported by {{ $report->reporter_name }} • {{ $report->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 rounded-full text-xs font-medium 
                                            {{ $report->severity == 'High' ? 'bg-red-600/20 text-red-400' : ($report->severity == 'Medium' ? 'bg-yellow-600/20 text-yellow-400' : 'bg-gray-600/20 text-gray-200') }}">
                                            {{ $report->severity }}
                                        </span>
                                    </div>
                                    <div class="mt-3 flex justify-between items-center">
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            {{ $report->status == 'Approved' ? 'bg-blue-600/20 text-blue-400' : ($report->status == 'Resolved' ? 'bg-gray-600/20 text-gray-200' : 'bg-blue-600/20 text-blue-400') }}">
                                            {{ $report->status }}
                                        </span>
                                        <div class="text-sm font-medium text-blue-400">
                                            {{ $report->bounty_amount ? 'Reward: $' . $report->bounty_amount : 'Bounty pending' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-700 px-4 py-2 border-t border-gray-600 text-right">
                                    <a href="" class="text-xs font-medium text-gray-200 hover:text-blue-400 flex items-center gap-1 transition-all duration-300">
                                        View details <i class="fas fa-chevron-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-400 py-8">
                                No vulnerability reports found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection