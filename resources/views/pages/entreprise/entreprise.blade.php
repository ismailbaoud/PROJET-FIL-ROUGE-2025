@extends('layouts.app')

@section('main')
<div class="flex flex-col md:flex-row h-screen">
    @include('partials.entreprise.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.entreprise.header')
        
        <main class="flex-1 text-center overflow-auto p-4 md:p-6 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
            <!-- Header -->
            <div class="max-w-7xl mx-auto mb-8 p-4 bg-white rounded-sm text-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Bug Bounty Command Center</h1>
                        <p class="text-gray-600">
                            Welcome back, <span class="font-semibold text-gray-900">{{ Auth::user()->userName }}</span>. 
                            <span class="hidden md:inline">
                                You have <span class="font-semibold text-green-600">{{ $reports->count() }} new reports today</span> requiring attention.
                            </span>
                        </p>
                    </div>
            </div>

            <!-- Programs Table -->
            <div class="max-w-7xl mx-auto mb-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-bug text-green-500"></i> Active Security Programs
                    </h2>
                </div>
                
                <div class="bg-white rounded-xl shadow-xs overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Reports</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Rewards</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($programs as $program)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">{{ $program->title }}</div>
                                        <div class="text-gray-500 text-xs">Created {{ $program->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium text-gray-900">
                                        {{ $program->reports_count ?? 0 }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium text-gray-900">
                                        {{ $program->reward_amount ?? '$0' }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $program->status == 'Active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $program->status }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        No active programs available.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Reports Section -->
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-shield-virus text-red-400"></i> Recent Vulnerability Reports
                    </h2>
                    <a href="{{ route('reportEntreprise') }}" class="text-sm font-medium text-gray-900 hover:text-gray-600 flex items-center gap-1">
                        View all <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    @forelse ($reports as $report)
                    <div class="bg-white rounded-xl shadow-xs border border-gray-200 hover:shadow-md transition-all">
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div class="flex items-start gap-3">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 mt-1">
                                        <i class="fas fa-user-secret"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $report->title }}</h3>
                                        <p class="text-gray-600 text-sm">Reported by {{ $report->reporter_name }} • {{ $report->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $report->severity == 'High' ? 'bg-red-100 text-red-800' : ($report->severity == 'Medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $report->severity }}
                                </span>
                            </div>
                            <div class="mt-3 flex justify-between items-center">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $report->status == 'Approved' ? 'bg-green-100 text-green-800' : ($report->status == 'Resolved' ? 'bg-gray-100 text-gray-800' : 'bg-blue-100 text-blue-800') }}">
                                    {{ $report->status }}
                                </span>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $report->bounty_amount ? 'Reward: $' . $report->bounty_amount : 'Bounty pending' }}
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-2 border-t border-gray-200 text-right">
                            <a href="" class="text-xs font-medium text-gray-900 hover:text-gray-600 flex items-center gap-1">
                                View details <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-500 py-8">
                        No vulnerability reports found.
                    </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
