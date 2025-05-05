@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.entreprise.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')
            <main class="flex-1 overflow-auto p-8 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="p-4 mt-14">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <div class="h-14 w-14 rounded-xl bg-blue-600/20 flex items-center justify-center border border-blue-500/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div class="absolute -bottom-2 -right-2 bg-blue-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                    P
                                </div>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-white">{{ Auth::user()->profile->companyName }} Programs</h1>
                            </div>
                        </div>
                        <button onclick="toggleForm('createForm')"
                            class="flex items-center gap-2 px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all duration-300 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            New Program
                        </button>
                    </div>

                    <div id="createForm" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                        <div class="bg-gray-800 rounded-2xl w-full max-w-2xl border border-gray-600 overflow-hidden shadow-lg">
                            <div class="flex items-center justify-between p-6 border-b border-gray-600">
                                <h3 class="text-2xl font-semibold text-white">Create New Bug Bounty Program</h3>
                                <button onclick="toggleForm('createForm')" class="text-gray-400 hover:text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <form id="createProgramForm" action="{{ route('createProgram') }}" method="POST" class="p-6 space-y-5">
                                @csrf
                                @include('components.programForm')
                            </form>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-2xl border border-gray-600 p-5 mb-8 shadow-lg">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <form id="filterForm" method="GET" action="">
                                <div class="flex flex-wrap gap-3">
                                    <div class="relative">
                                        <select name="status" id="statusFilter" onchange="document.getElementById('filterForm').submit();"
                                            class="appearance-none pl-4 pr-10 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-sm text-gray-200">
                                            <option value="">All Status</option>
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                            
                                    <div class="relative">
                                        <select name="sort" id="sortBy" onchange="document.getElementById('filterForm').submit();"
                                            class="appearance-none pl-4 pr-10 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-sm text-gray-200">
                                            <option value="">select</option>
                                            <option value="newest">Newest First</option>
                                            <option value="highest_bounty">Highest Bounty</option>
                                        </select>
                                    </div>
                            
                                    <div class="relative w-full md:w-64">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search programs..."
                                            class="w-full pl-10 pr-4 py-2.5 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                                            onkeydown="if (event.key === 'Enter') document.getElementById('filterForm').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-3 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <div class="p-4 border-2 border-gray-600 border-dashed rounded-lg">
                        <h1 class="text-2xl font-bold text-white mb-6">My Programmes</h1>

                        @if ($programs->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($programs as $program)
                                    <div class="bg-gray-800 rounded-2xl border border-gray-600 p-6 shadow-sm transition-all hover:shadow-md">
                                        <div class="flex items-center gap-4 mb-4">
                                            <div class="h-12 w-12 flex items-center justify-center bg-blue-600/20 text-blue-400 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-lg font-semibold text-white">{{ $program->title }}</h2>
                                                <p class="text-sm text-gray-400">{{ Str::limit($program->description, 60) }}</p>
                                            </div>
                                        </div>

                                        <div class="mb-4 space-y-1 text-sm text-gray-200">
                                            <p><strong>Bounty:</strong> ${{ number_format($program->min_reward) }} - ${{ number_format($program->max_reward) }}</p>
                                            <p><strong>Reports:</strong> {{ $program->reports_count }}</p>
                                            <p><strong>Status:</strong>
                                                <span class="inline-block px-2 py-1 text-xs rounded-full
                                                    {{ $program->status === 'rejete' ? 'bg-red-600/20 text-red-400' : ($program->status === 'accepte' ? 'bg-blue-600/20 text-blue-400' : 'bg-gray-600/20 text-gray-200') }}">
                                                    {{ ucfirst($program->status) }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="flex justify-between items-center mt-4 text-sm">
                                            <a href="{{ route('programDetails', $program->id) }}" class="text-blue-400 hover:text-blue-300">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <div class="flex items-center space-x-2">
                                                <button onclick="toggleForm('updateForm-{{ $program->id }}')"
                                                    class="text-blue-400 hover:text-blue-300" title="Modifier">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <div id="updateForm-{{ $program->id }}"
                                                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                                                    <div class="bg-gray-800 rounded-2xl w-full max-w-2xl border border-gray-600 overflow-hidden shadow-lg">
                                                        <div class="flex items-center justify-between p-6 border-b border-gray-600">
                                                            <h3 class="text-2xl font-semibold text-white">Update Bug Bounty Program</h3>
                                                            <button onclick="toggleForm('updateForm-{{ $program->id }}')"
                                                                class="text-gray-400 hover:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <form id="updateProgramForm" action="{{ route('entreprise_program_edit', $program->id) }}" method="POST" class="p-6 space-y-5">
                                                            @csrf
                                                            @include('components.programForm')
                                                        </form>
                                                    </div>
                                                </div>
                                                <form action="{{ route('entreprise_program_delete', $program->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($program->status === 'rejete')
                                                        <button class="text-red-400 hover:text-red-300">
                                                            <i class="fas fa-ban text-lg"></i>
                                                        </button>
                                                    @elseif ($program->status === 'accepte')
                                                        <button class="text-blue-400 hover:text-blue-300">
                                                            <i class="fas fa-check-circle text-lg"></i>
                                                        </button>
                                                    @else
                                                        <button class="text-yellow-400 hover:text-yellow-300">
                                                            <i class="fas fa-hourglass-half text-lg"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-400">No program disponible.</p>
                        @endif
                    </div>

                    <div class="mt-10">
                        {{ $programs->appends(request()->query())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/entreprises/program.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#createProgramForm');
    

    form.addEventListener('submit', function (e) {
        let hasError = false;

        document.querySelectorAll('.js-error').forEach(el => el.remove());

        function showError(input, message) {
            const error = document.createElement('p');
            error.className = 'text-sm text-red-600 mt-1 js-error';
            error.innerText = message;
            input.parentElement.appendChild(error);
            hasError = true;
        }

        const title = document.getElementById('name');
        const description = document.getElementById('description');
        const minReward = document.getElementById('min_reward');
        const maxReward = document.getElementById('max_reward');

        if (!title.value.trim()) {
            showError(title, 'Program name is required.');
        }

        if (!description.value.trim()) {
            showError(description, 'Description is required.');
        }

        if (!minReward.value.trim() || isNaN(minReward.value) || parseFloat(minReward.value) < 0) {
            showError(minReward, 'Please enter a valid minimum reward.');
        }

        if (!maxReward.value.trim() || isNaN(maxReward.value) || parseFloat(maxReward.value) < 0) {
            showError(maxReward, 'Please enter a valid maximum reward.');
        }

        if (
            !hasError &&
            parseFloat(minReward.value) > parseFloat(maxReward.value)
        ) {
            showError(maxReward, 'Max reward must be greater than or equal to min reward.');
        }

        if (hasError) {
            e.preventDefault();
        }

    });
});
    </script>
@endsection