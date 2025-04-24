@extends('layouts.app')

@section('main')
<div class="flex min-h-screen">
    @include('partials.hunter.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')
        
        <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
            <div class="max-w-7xl mx-auto">
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Your Joined Programs
                        </h1>
                        <p class="text-gray-600 mt-1">Programs you're currently participating in</p>
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
                    <div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h2 class="text-lg font-semibold text-gray-900">{{ $program->title }}</h2>
                                <span class="text-xs font-medium capitalize px-2 py-1 rounded-full 
                                {{ $program->status === 'accepte' ? 'bg-green-100 text-green-800' : 
                                   ($program->status === 'rejete' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ $program->status }}
                            </span>
                            </div>

                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $program->description }}</p>

                            <div class="space-y-3 mb-4">
                                <div>
                                    <div class="text-xs font-medium text-gray-500 mb-1">Max Reward</div>
                                    <div class="text-sm font-semibold text-gray-900">
                                        ${{ number_format($program->max_reward, 2) }}
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 mb-1">Last Updated</div>
                                        <div class="text-sm text-gray-900">{{ $program->updated_at->format('M d, Y') }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 mb-1">Your Reports</div>
                                        <div class="text-sm text-gray-900">{{ $program->user_reports_count ?? 0 }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                                <a href="{{ route('programDetails', $program->id) }}" class="text-sm font-medium text-red-600 hover:text-red-800 flex items-center">
                                    View Program
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No programs joined yet</h3>
                    <p class="mt-1 text-sm text-gray-500">You haven't joined any programs yet.</p>
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