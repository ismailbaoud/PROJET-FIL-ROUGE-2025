@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-gray-50">
        @include('partials.hunter.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.hunter.header')

            <main class="flex-1 overflow-auto p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Report Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                {{ $report->title }}
                            </h1>
                            <div class="flex items-center gap-4 mt-2">
                                <span
                                    class="text-xs font-medium capitalize px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">
                                    {{ ucfirst($report->status) }}
                                </span>
                                <span class="text-sm text-gray-600">
                                    Submitted {{ $report->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Report Content -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Report Details</h2>
                        <ul class="text-sm text-gray-700 space-y-2">
                            <li><strong>Type:</strong> {{ $report->type }}</li>
                            <li><strong>Target:</strong> {{ $report->target }}</li>
                            <li><strong>Severity:</strong> {{ $report->severity }}</li>
                            <li><strong>Reward:</strong> ${{ $report->reward }}</li>
                            <li><strong>Pointe:</strong> {{ $report->pointe }} pts</li>
                            <li><strong>Status:</strong> {{ ucfirst($report->status) }}</li>
                        </ul>
                    </div>

                    <!-- Steps -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-2">Steps to Reproduce</h2>
                        <div class="prose text-gray-700">
                            {!! nl2br(e($report->steps)) !!}
                        </div>
                    </div>

                    <!-- Impact -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-2">Impact</h2>
                        <div class="prose text-gray-700">
                            {!! nl2br(e($report->impact)) !!}
                        </div>
                    </div>
                    <!-- POC (if exists) -->
                    @if ($report->poc)
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6 mb-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Proof of Concept</h2>

                            @if (Str::endsWith($report->poc, ['.mp4', '.webm', '.ogg']))
                                <video controls class="w-full rounded-lg">
                                    <source src="{{ asset('uploads/' . $report->poc) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <div class="prose text-gray-700">
                                    {!! nl2br(e($report->poc)) !!}
                                </div>
                            @endif
                        </div>
                    @endif

                </div>
            </main>
        </div>
    </div>
@endsection
