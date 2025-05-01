@extends('layouts.app')

@section('main')
    <div class="flex h-screen">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            @include('partials.admin.header')

        <main class="flex-1 p-6 bg-gradient-to-t from-white via-white via-5% to-[#E8F5E9] ">
            <div class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white rounded-md p-6">
                        <div class="text-sm text-[#6b7280] mb-2">Active Users</div>
                        <div class="text-3xl font-semibold text-[#111827] mb-2">{{$activeUsers}}</div>
                        <div class="text-sm text-success">+12% new today</div>
                    </div>
                    <div class="bg-white rounded-md p-6">
                        <div class="text-sm text-[#6b7280] mb-2">Total Programs</div>
                        <div class="text-3xl font-semibold text-[#111827] mb-2">{{$totalPrograms}}</div>
                        <div class="text-sm text-success">+3 new today</div>
                    </div>
                    <div class="bg-white rounded-md p-6">
                        <div class="text-sm text-[#6b7280] mb-2">Total Payouts</div>
                        <div class="text-3xl font-semibold text-[#111827] mb-2">${{$totalPayounts}}</div>
                        <div class="text-sm text-[#6b7280]">+2 new today</div>
                    </div>
                    <div class="bg-white rounded-md p-6">
                        <div class="text-sm text-[#6b7280] mb-2">Totla Reports</div>
                        <div class="text-3xl font-semibold text-[#111827] mb-2">{{$totalReports}}</div>
                        <div class="text-sm text-danger">+3 new today</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white rounded-md p-6 border border-black border-2">
                        <h2 class="text-xl font-semibold text-[#111827] mb-4">Recent Reports</h2>

                        <div class="space-y-4">
                            @foreach ($reports as $report)
                                <div class="flex items-center justify-between border border-gray-200 border-2 p-6">
                                    <div>
                                        <div class="text-[#111827] font-medium">{{ $report->type }}</div>
                                        <div class="text-[#6b7280] text-sm">{{ $report->title }}</div>
                                    </div>
                                    <div class="text-[#6b7280] text-sm">Reported By {{ $report->user->userName }}</div>
                                    <div class="text-[#6b7280] text-sm">{{ $report->created_at }}</div>
                                    <div class="text-[#6b7280] text-sm">{{ $report->status }}</div>

                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded-md p-6 border border-black border-2">
                        <h2 class="text-xl font-semibold text-[#111827] mb-4">Last Programs</h2>

                        <div class="space-y-4">
                            @foreach ($programs as $program)
                                <div class="flex items-center justify-between border border-2 border-gray-200 p-6">
                                        <div class="text-[#111827] font-medium">{{ $program->title }}</div>
                                        <div class="text-[#6b7280] text-sm">{{ $program->description }}</div>
                                        <div class="text-[#6b7280] text-sm">{{ $program->min_reward }}</div>
                                        <div class="text-[#6b7280] text-sm">{{ $program->max_reward }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-md p-6 border border-black border-2">
                    <h2 class="text-xl font-semibold text-[#111827] mb-4">Recent Users (Hunters)</h2>

                    <div class="space-y-4">
                        @foreach($hunters as $hunter)
                        <div class="flex items-center justify-between border border-2 border-gray-200 p-6">
                                <div class="text-[#111827] font-medium">{{$hunter->userName}}</div>
                                <div>
                                    <div class="text-[#6b7280] text-sm">Registered on {{$hunter->created_at}}</div>
                                </div>
                                <div class="text-[#6b7280] text-sm">{{$hunter->status}}</div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="bg-white rounded-md p-6 border border-black border-2">
                    <h2 class="text-xl font-semibold text-[#111827] mb-4">Recent Enterprises</h2>

                    <div class="space-y-4">
                        @foreach ($entreprises as $entreprise)
                            <div class="flex items-center justify-between border border-2 border-gray-200 p-6">
                                <div class="text-[#111827] font-medium">{{$entreprise->userName }}</div>
                                <div>
                                    <div class="text-[#6b7280] text-sm">Registered on {{$entreprise->created_at}}</div>
                                </div>
                                <div class="text-[#6b7280] text-sm">{{$entreprise->status}}</div>
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
