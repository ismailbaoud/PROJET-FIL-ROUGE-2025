@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-white">
        @if (Auth::user()->role == 'hunter')
            @include('partials.hunter.sidebar')
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('partials.hunter.header')
        @elseif(Auth::user()->role == 'entreprise')
            @include('partials.entreprise.sidebar')
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('partials.entreprise.header')
        @endif
        <main class="flex-1 overflow-auto p-8 bg-gradient-to-br from-gray-900 to-gray-700">
            <div class="w-[100%] mx-auto space-y-8">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 p-6 bg-gray-800 rounded-xl shadow-sm border border-gray-700">
                    <div class="flex flex-col space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-red-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white">
                                {{ $program->title }}
                            </h1>
                        </div>
                        <div class="flex flex-wrap items-center gap-4">
                            <span
                                class="text-sm font-medium capitalize px-3 py-1 rounded-full transition-all duration-300 
                                    {{ $program->status === 'accepted'
                                        ? 'bg-green-600 text-green-100'
                                        : ($program->status === 'rejected'
                                            ? 'bg-red-600 text-red-100'
                                            : 'bg-yellow-600 text-yellow-100') }}">
                                {{ $program->status }}
                            </span>
                            <span class="text-sm text-gray-300 font-medium bg-gray-700 px-3 py-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Reward: ${{ number_format($program->min_reward, 0) }} -
                                ${{ number_format($program->max_reward, 0) }}
                            </span>
                            <span class="text-sm text-gray-300 font-medium bg-gray-700 px-3 py-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Created: {{ $program->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'hunter' && !$isJoined)
                        <form action="/programs/{{ $program->id }}/join" method="POST">
                            @csrf
                            <button
                                class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Join Program
                            </button>
                        </form>
                    @elseif (Auth::user()->role == 'hunter' && $isJoined)
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                            <div class="px-5 py-2.5 bg-green-600 border border-green-500 text-white rounded-lg flex items-center gap-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Participating
                            </div>
                            <a href="{{ route('hunter_report_submit', $program->id) }}"
                                class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Submit Report
                            </a>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 space-y-6">
                        <div
                            class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6 transition-all duration-300 hover:shadow-md">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-gray-700 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-white">
                                    Program Description
                                </h2>
                            </div>
                            <div class="prose prose-sm text-gray-300 max-w-none">
                                {!! nl2br(e($program->description)) !!}
                            </div>
                        </div>

                        <div
                            class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6 transition-all duration-300 hover:shadow-md">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-gray-700 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-white">
                                    Entreprise Details
                                </h2>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Company Name</p>
                                        <p class="text-white">{{ $program->entreprise->userName }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Contact Email</p>
                                        <p class="text-white">{{ $program->entreprise->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::user()->role == 'entreprise')
                            <div
                                class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6 transition-all duration-300 hover:shadow-md">
                                <h2 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Scope
                                </h2>

                                <form action="{{ route('scopes.store', $program->id) }}" method="POST"
                                    class="space-y-6 text-white">
                                    @csrf
                                    <div>
                                        <label for="target"
                                            class="block text-sm font-medium text-gray-300 mb-1">Target</label>
                                        <input type="text" name="target" id="target"
                                            class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                            required>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div>
                                            <label for="target_type"
                                                class="block text-sm font-medium text-gray-300 mb-1">Target Type</label>
                                            <select name="target_type" id="target_type"
                                                class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                required>
                                                <option value="web">Web</option>
                                                <option value="mobile">Mobile</option>
                                                <option value="api">API</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="type"
                                                class="block text-sm font-medium text-gray-300 mb-1">Scope Type</label>
                                            <select name="type" id="type"
                                                class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                required>
                                                <option value="in">In Scope</option>
                                                <option value="out">Out of Scope</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="instructions"
                                            class="block text-sm font-medium text-gray-300 mb-1">Instructions</label>
                                        <textarea name="instructions" id="instructions" rows="4"
                                            class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                            required></textarea>
                                    </div>

                                    <button type="submit"
                                        class="mt-4 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                        Submit Scope
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    @if ($isJoined || Auth::user()->role == 'entreprise')
                        <div class="lg:col-span-2 space-y-6">
                            <div
                                class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md">
                                <div class="border-b border-gray-600 px-6 py-4 bg-gray-700">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-green-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <h2 class="text-xl font-semibold text-white">
                                            In Scope Targets
                                        </h2>
                                        <span
                                            class="ml-auto bg-green-600 text-white text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ count($inScope) }} targets
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left divide-y divide-gray-600">
                                        <thead class="text-xs text-gray-300 uppercase bg-gray-700">
                                            <tr>
                                                <th class="px-6 py-3">Target</th>
                                                <th class="px-6 py-3">Type</th>
                                                <th class="px-6 py-3">Instructions</th>
                                                @if (Auth::user()->role == 'entreprise')
                                                    <th class="px-6 py-3 text-right">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-600">
                                            @foreach ($inScope as $scope)
                                                <tr class="hover:bg-gray-700 transition-colors duration-150">
                                                    <td class="px-6 py-4">
                                                        <a href="{{ $scope->target }}"
                                                            class="text-blue-400 hover:underline flex items-center gap-1">
                                                            {{ $scope->target }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span
                                                            class="px-2 py-1 text-xs font-medium bg-blue-600 text-white rounded-full">
                                                            {{ $scope->target_type }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-gray-300 max-w-xs truncate">
                                                        {{ $scope->instructions }}</td>
                                                    @if (Auth::user()->role == 'entreprise')
                                                        <td class="px-6 py-4 text-right">
                                                            <div class="flex justify-end gap-2">
                                                                <button onclick="toggleForm('updateForm-{{ $scope->id }}')"
                                                                    class="p-1.5 text-gray-400 hover:text-blue-400 rounded-full hover:bg-gray-600 transition-colors duration-200">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-5 w-5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </button>
                                                                <form action="{{ route('scopes.destroy', $scope->id) }}"
                                                                    method="POST" class="inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="p-1.5 text-gray-400 hover:text-red-400 rounded-full hover:bg-gray-600 transition-colors duration-200">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @if (Auth::user()->role == 'entreprise')
                                                    <tr id="updateForm-{{ $scope->id }}" class="hidden">
                                                        <td colspan="4" class="px-6 py-4">
                                                            <form action="{{ route('scopes.update', $scope->id) }}" method="POST" class="space-y-6 text-white">
                                                                @csrf
                                                                @method('PUT')
                                                                <div>
                                                                    <label for="target-{{ $scope->id }}"
                                                                        class="block text-sm font-medium text-gray-300 mb-1">Target</label>
                                                                    <input type="text" name="target" id="target-{{ $scope->id }}"
                                                                        value="{{ $scope->target }}"
                                                                        class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        required>
                                                                </div>
                                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="target_type-{{ $scope->id }}"
                                                                            class="block text-sm font-medium text-gray-300 mb-1">Target Type</label>
                                                                        <select name="target_type" id="target_type-{{ $scope->id }}"
                                                                            class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                            required>
                                                                            <option value="web" {{ $scope->target_type == 'web' ? 'selected' : '' }}>Web</option>
                                                                            <option value="mobile" {{ $scope->target_type == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                                                            <option value="api" {{ $scope->target_type == 'api' ? 'selected' : '' }}>API</option>
                                                                            <option value="other" {{ $scope->target_type == 'other' ? 'selected' : '' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <label for="type-{{ $scope->id }}"
                                                                            class="block text-sm font-medium text-gray-300 mb-1">Scope Type</label>
                                                                        <select name="type" id="type-{{ $scope->id }}"
                                                                            class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                            required>
                                                                            <option value="in" {{ $scope->type == 'in' ? 'selected' : '' }}>In Scope</option>
                                                                            <option value="out" {{ $scope->type == 'out' ? 'selected' : '' }}>Out of Scope</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label for="instructions-{{ $scope->id }}"
                                                                        class="block text-sm font-medium text-gray-300 mb-1">Instructions</label>
                                                                    <textarea name="instructions" id="instructions-{{ $scope->id }}" rows="4"
                                                                        class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        required>{{ $scope->instructions }}</textarea>
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <button type="submit"
                                                                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                                                        Update Scope
                                                                    </button>
                                                                    <button type="button" onclick="toggleForm('updateForm-{{ $scope->id }}')"
                                                                        class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div
                                class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md">
                                <div class="border-b border-gray-600 px-6 py-4 bg-gray-700">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-red-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                        <h2 class="text-xl font-semibold text-white">
                                            Out of Scope Targets
                                        </h2>
                                        <span
                                            class="ml-auto bg-red-600 text-white text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ count($outOfScope) }} targets
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left divide-y divide-gray-600">
                                        <thead class="text-xs text-gray-300 uppercase bg-gray-700">
                                            <tr>
                                                <th class="px-6 py-3">Target</th>
                                                <th class="px-6 py-3">Type</th>
                                                <th class="px-6 py-3">Instructions</th>
                                                @if (Auth::user()->role == 'entreprise')
                                                    <th class="px-6 py-3 text-right">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-600">
                                            @foreach ($outOfScope as $scope)
                                                <tr class="hover:bg-gray-700 transition-colors duration-150">
                                                    <td class="px-6 py-4 text-white">{{ $scope->target }}</td>
                                                    <td class="px-6 py-4">
                                                        <span
                                                            class="px-2 py-1 text-xs font-medium bg-gray-600 text-white rounded-full">
                                                            {{ $scope->target_type }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-gray-300 max-w-xs truncate">
                                                        {{ $scope->instructions }}</td>
                                                    @if (Auth::user()->role == 'entreprise')
                                                        <td class="px-6 py-4 text-right">
                                                            <div class="flex justify-end gap-2">
                                                                <button onclick="toggleForm('updateForm-{{ $scope->id }}')"
                                                                    class="p-1.5 text-gray-400 hover:text-blue-400 rounded-full hover:bg-gray-600 transition-colors duration-200">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-5 w-5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </button>
                                                                <form action="{{ route('scopes.destroy', $scope->id) }}"
                                                                    method="POST" class="inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="p-1.5 text-gray-400 hover:text-red-400 rounded-full hover:bg-gray-600 transition-colors duration-200">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @if (Auth::user()->role == 'entreprise')
                                                    <tr id="updateForm-{{ $scope->id }}" class="hidden">
                                                        <td colspan="4" class="px-6 py-4">
                                                            <form action="{{ route('scopes.update', $scope->id) }}" method="POST" class="space-y-6 text-white">
                                                                @csrf
                                                                @method('PUT')
                                                                <div>
                                                                    <label for="target-{{ $scope->id }}"
                                                                        class="block text-sm font-medium text-gray-300 mb-1">Target</label>
                                                                    <input type="text" name="target" id="target-{{ $scope->id }}"
                                                                        value="{{ $scope->target }}"
                                                                        class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        required>
                                                                </div>
                                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="target_type-{{ $scope->id }}"
                                                                            class="block text-sm font-medium text-gray-300 mb-1">Target Type</label>
                                                                        <select name="target_type" id="target_type-{{ $scope->id }}"
                                                                            class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                            required>
                                                                            <option value="web" {{ $scope->target_type == 'web' ? 'selected' : '' }}>Web</option>
                                                                            <option value="mobile" {{ $scope->target_type == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                                                            <option value="api" {{ $scope->target_type == 'api' ? 'selected' : '' }}>API</option>
                                                                            <option value="other" {{ $scope->target_type == 'other' ? 'selected' : '' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <label for="type-{{ $scope->id }}"
                                                                            class="block text-sm font-medium text-gray-300 mb-1">Scope Type</label>
                                                                        <select name="type" id="type-{{ $scope->id }}"
                                                                            class="block w-full border bg-gray-700 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                            required>
                                                                            <option value="in" {{ $scope->type == 'in' ? 'selected' : '' }}>In Scope</option>
                                                                            <option value="out" {{ $scope->type == 'out' ? 'selected' : '' }}>Out of Scope</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label for="instructions-{{ $scope->id }}"
                                                                        class="block text-sm font-medium text-gray-300 mb-1">Instructions</label>
                                                                    <textarea name="instructions" id="instructions-{{ $scope->id }}" rows="4"
                                                                        class="block w-full border border-gray-600 bg-gray-700 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        required>{{ $scope->instructions }}</textarea>
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <button type="submit"
                                                                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                                                        Update Scope
                                                                    </button>
                                                                    <button type="button" onclick="toggleForm('updateForm-{{ $scope->id }}')"
                                                                        class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-300 flex items-center gap-2 shadow-sm hover:shadow-md">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleForm(formId) {
            const form = document.getElementById(formId);
            if (form.classList.contains('hidden')) {
                document.querySelectorAll('tr[id^="updateForm-"]').forEach(f => f.classList.add('hidden'));
                form.classList.remove('hidden');
            } else {
                form.classList.add('hidden');
            }
        }
    </script>
@endsection