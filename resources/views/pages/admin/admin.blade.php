@extends('layouts.app')

@section('main')
    <div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.admin.header')

            <main class="flex-1 p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-600">
                            <div class="text-sm text-gray-400 mb-2 flex items-center gap-2">
                                <i class="fas fa-users text-blue-400"></i>
                                Active Users
                            </div>
                            <div class="text-3xl font-semibold text-white mb-2">{{$activeUsers}}</div>
                            <div class="text-sm text-blue-400">+12% new today</div>
                        </div>
                        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-600">
                            <div class="text-sm text-gray-400 mb-2 flex items-center gap-2">
                                <i class="fas fa-briefcase text-blue-400"></i>
                                Total Programs
                            </div>
                            <div class="text-3xl font-semibold text-white mb-2">{{$totalPrograms}}</div>
                            <div class="text-sm text-blue-400">+3 new today</div>
                        </div>
                        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-600">
                            <div class="text-sm text-gray-400 mb-2 flex items-center gap-2">
                                <i class="fas fa-dollar-sign text-blue-400"></i>
                                Total Payouts
                            </div>
                            <div class="text-3xl font-semibold text-white mb-2">${{$totalPayounts}}</div>
                            <div class="text-sm text-gray-400">+2 new today</div>
                        </div>
                        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-600">
                            <div class="text-sm text-gray-400 mb-2 flex items-center gap-2">
                                <i class="fas fa-clipboard-list text-blue-400"></i>
                                Total Reports
                            </div>
                            <div class="text-3xl font-semibold text-white mb-2">{{$totalReports}}</div>
                            <div class="text-sm text-red-400">+3 new today</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-600 shadow-lg">
                            <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                <i class="fas fa-file-alt text-blue-400"></i>
                                Recent Reports
                            </h2>
                            <div class="space-y-4">
                                @foreach ($reports as $report)
                                    <div class="flex items-center justify-between border border-gray-600 rounded-lg p-6 bg-gray-700/50">
                                        <div>
                                            <div class="text-white font-medium">{{ $report->type }}</div>
                                            <div class="text-gray-400 text-sm">{{ $report->title }}</div>
                                        </div>
                                        <div class="text-gray-400 text-sm">Reported By {{ $report->user->userName }}</div>
                                        <div class="text-gray-400 text-sm">{{ $report->created_at }}</div>
                                        <div class="text-blue-400 text-sm">{{ $report->status }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-600 shadow-lg">
                            <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                <i class="fas fa-folder-open text-blue-400"></i>
                                Last Programs
                            </h2>
                            <div class="space-y-4">
                                @foreach ($programs as $program)
                                    <div class="flex items-center justify-between border border-gray-600 rounded-lg p-6 bg-gray-700/50">
                                        <div class="text-white font-medium">{{ $program->title }}</div>
                                        <div class="text-gray-400 text-sm">{{ $program->description }}</div>
                                        <div class="text-blue-400 text-sm">${{ $program->min_reward }}</div>
                                        <div class="text-blue-400 text-sm">${{ $program->max_reward }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-600 shadow-lg">
                            <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                <i class="fas fa-user-check text-blue-400"></i>
                                Recent Users (Hunters)
                            </h2>
                            <div class="space-y-4">
                                @foreach($hunters as $hunter)
                                    <div class="flex items-center justify-between border border-gray-600 rounded-lg p-6 bg-gray-700/50">
                                        <div class="text-white font-medium">{{ $hunter->userName }}</div>
                                        <div>
                                            <div class="text-gray-400 text-sm">Registered on {{ $hunter->created_at }}</div>
                                        </div>
                                        <div class="text-blue-400 text-sm">{{ $hunter->status }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-600 shadow-lg">
                            <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                <i class="fas fa-building text-blue-400"></i>
                                Recent Enterprises
                            </h2>
                            <div class="space-y-4">
                                @foreach ($entreprises as $entreprise)
                                    <div class="flex items-center justify-between border border-gray-600 rounded-lg p-6 bg-gray-700/50">
                                        <div class="text-white font-medium">{{ $entreprise->userName }}</div>
                                        <div>
                                            <div class="text-gray-400 text-sm">Registered on {{ $entreprise->created_at }}</div>
                                        </div>
                                        <div class="text-blue-400 text-sm">{{ $entreprise->status }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection