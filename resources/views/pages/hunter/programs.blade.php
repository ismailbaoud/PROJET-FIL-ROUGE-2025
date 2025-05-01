@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-white">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Bug Bounty Programs
                        </h1>
                        <p class="text-gray-600 mt-1">Find and participate in security research programs</p>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Search programs..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>
                        <div class="relative w-full md:w-48">
                            <select id="statusFilter" class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 appearance-none" onchange="applyFilters()">
                                <option value="">All Statuses</option>
                                <option value="accepte" {{ request('status') === 'accepte' ? 'selected' : '' }}>Active</option>
                                <option value="rejete" {{ request('status') === 'rejete' ? 'selected' : '' }}>Inactive</option>
                                <option value="en_attente" {{ request('status') === 'en_attente' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative w-full md:w-48">
                            <select id="sortBy" class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 appearance-none" onchange="applyFilters()">
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="highest_bounty" {{ request('sort') === 'highest_bounty' ? 'selected' : '' }}>Highest Bounty</option>
                                <option value="recently_updated" {{ request('sort') === 'recently_updated' ? 'selected' : '' }}>Recently Updated</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
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
                                    <div class="text-xs font-medium text-gray-500 mb-1">Reward Range</div>
                                    <div class="text-sm font-semibold text-gray-900">
                                        ${{ number_format($program->min_reward, 0) }} - ${{ number_format($program->max_reward, 0) }}
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 mb-1">Last Updated</div>
                                        <div class="text-sm text-gray-900">{{ $program->updated_at->format('M d, Y') }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs font-medium text-gray-500 mb-1">Reports</div>
                                        <div class="text-sm text-gray-900">{{ $program->reports_count ?? 0 }}</div>
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
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No programs found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                    <button class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm" onclick="resetFilters()">
                        Reset Filters
                    </button>
                </div>
                @endif

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $programs->appends(request()->query())->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

<script src="{{ asset('js/hunter/program.js') }}" defer></script>

@endsection