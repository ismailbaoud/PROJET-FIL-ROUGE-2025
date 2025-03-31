@extends('layouts.app')

@section('main')
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-20 bg-white fixed h-full border-r border-gray-200">
        @include('components.sidebar')
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white ml-76 mr-30 flex flex-col h-screen">
        @include('components.header')

        <div class="flex-1 overflow-auto p-6">
            <!-- Welcome -->
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Welcome back, John!</h1>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @foreach([
                    ['value' => '12', 'label' => 'Active Programs'],
                    ['value' => '45', 'label' => 'Pending Reports'],
                    ['value' => '$24.5k', 'label' => 'Rewards Paid'],
                    ['value' => '89%', 'label' => 'Response Rate']
                ] as $stat)
                <div class="bg-white shadow rounded-md p-6">
                    <div class="text-3xl font-semibold text-gray-900">{{ $stat['value'] }}</div>
                    <div class="text-gray-600 mt-1">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>

            <!-- Actions -->
            <div class="flex justify-between mb-6">
                <button class="bg-gray-900 hover:bg-gray-800 text-white rounded-md px-4 py-2 flex items-center gap-2">
                    <i class="fas fa-plus text-sm"></i> Create New Program
                </button>
                <button class="bg-white text-gray-900 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-50">
                    View All Reports
                </button>
            </div>

            <!-- Active Programs -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Active Programs</h2>
                <div class="bg-white shadow rounded-md overflow-hidden">
                    <div class="grid grid-cols-4 p-4 border-b border-gray-300 text-gray-600">
                        <div>Program Name</div>
                        <div class="text-right">Status</div>
                        <div class="text-right">Reports</div>
                        <div class="text-right">Rewards</div>
                    </div>
                    @foreach([
                        ['name' => 'Web Application Security', 'status' => 'Active', 'reports' => '24', 'reward' => '$12,000'],
                        ['name' => 'Mobile App Security', 'status' => 'In Review', 'reports' => '18', 'reward' => '$8,500']
                    ] as $program)
                    <div class="grid grid-cols-4 p-4 border-b border-gray-200">
                        <div class="text-gray-900">{{ $program['name'] }}</div>
                        <div class="text-right {{ $program['status'] == 'Active' ? 'text-green-500' : 'text-gray-500' }}">
                            {{ $program['status'] }}
                        </div>
                        <div class="text-right text-gray-900">{{ $program['reports'] }}</div>
                        <div class="text-right text-gray-900">{{ $program['reward'] }}</div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Recent Reports -->
            <section>
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Recent Reports</h2>
                <div class="space-y-4">
                    @foreach([
                        ['name' => 'SQL Injection Vulnerability', 'reporter' => 'Alice Smith', 'time' => '2 hours ago', 'status' => 'Under Review'],
                        ['name' => 'XSS in Search Function', 'reporter' => 'Bob Johnson', 'time' => '5 hours ago', 'status' => 'Approved']
                    ] as $report)
                    <div class="bg-white shadow rounded-md p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                    {{ substr($report['reporter'], 0, 2) }}
                                </div>
                                <div>
                                    <div class="text-gray-900 font-medium">{{ $report['name'] }}</div>
                                    <div class="text-gray-600 text-sm">Reported by {{ $report['reporter'] }} • {{ $report['time'] }}</div>
                                </div>
                            </div>
                            <div class="px-3 py-1 rounded-full text-sm {{ $report['status'] == 'Approved' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600' }}">
                                {{ $report['status'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </main>
</div>
@endsection
