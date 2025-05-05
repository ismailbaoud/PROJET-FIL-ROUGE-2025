@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-white">
    @include('partials.hunter.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')
        
        <main class="flex-1 overflow-auto p-6  bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="w-[100%] mx-auto">
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Leaderboard
                        </h1>
                        <p class="text-gray-300 mt-1">Top security researchers by reputation points</p>
                    </div>
                </div>

                <!-- Leaderboard Table -->
                <div class="bg-gray-800 rounded-xl shadow-xs border border-gray-700 overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rank</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Hunter</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Points</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Country</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach ($profiles as $profile)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1.5 rounded-full text-xs font-medium text-white">
                                        #{{ $profile->rank }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold mr-3">
                                            <img src="{{ asset('storage/' . $profile->content_visual) }}" alt="" class="h-full w-full rounded-full object-cover">
                                        </div>
                                        <div class="text-sm font-medium text-white">{{ $profile->user->username }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-semibold">
                                    {{ $profile->pointes }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $profile->country }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('hunter.profile', $profile->user->id) }}" class="text-red-400 hover:text-red-300 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection