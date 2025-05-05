@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-white">
    @include('partials.hunter.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')
        
        <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="w-[100%] mx-auto">
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Your Joined Programs
                        </h1>
                        <p class="text-gray-300 mt-1">Programs you're currently participating in</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('programs') }}" class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Browse More Programs
                        </a>
                    </div>
                </div>

                <!-- Programs Grid -->
                @if($programs->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($programs as $program)
                    <div class="bg-gray-800 rounded-xl shadow-xs border border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h2 class="text-lg font-semibold text-white">{{ $program->title }}</h2>
                                <span class="text-xs font-medium capitalize px-2 py-1 rounded-full 
                                {{ $program->status === 'accepted' ? 'bg-green-600 text-green-100' : 
                                   ($program->status === 'rejected' ? 'bg-red-600 text-red-100' : 'bg-yellow-600 text-yellow-100') }}">
                                {{ $program->status }}
                            </span>
                            </div>

                            <p class="text-sm text-gray-300 mb-4 line-clamp-3">{{ $program->description }}</p>

                            <div class="space-y-3 mb-4">
                                <div>
                                    <div class="text-xs font-medium text-gray-400 mb-1">Max Reward</div>
                                    <div class="text-sm font-semibold text-white">
                                        ${{ number_format($program->max_reward, 2) }}
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <div class="text-xs font-medium text-gray-400 mb-1">Last Updated</div>
                                        <div class="text-sm text-white">{{ $program->updated_at->format('M d, Y') }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-400 mb-1">Your Reports</div>
                                        <div class="text-sm text-white">{{ $program->user_reports_count ?? 0 }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-gray-700">
                                <a href="{{ route('programDetails', $program->id) }}" class="text-sm font-medium text-red-400 hover:text-red-300 flex items-center">
                                    View Program
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="bg-gray-800 rounded-xl shadow-xs border border-gray-700 p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-white">No programs joined yet</h3>
                    <p class="mt-1 text-sm text-gray-300">You haven't joined any programs yet.</p>
                    <a href="{{ route('programs') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">
                        Browse Available Programs
                    </a>
                </div>
                @endif

                <!-- Pagination -->
                @if($programs->count() > 0)
                <div class="mt-8">
                    {{ $programs->links() }}
                </div>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection