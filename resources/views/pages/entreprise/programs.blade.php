@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-gray-100">

        @include('partials.entreprise.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')

            <main class="flex-1 overflow-auto p-8 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
                <div class="p-4 mt-14">
                    <!-- Security Header with Program Stats -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <div
                                    class="h-14 w-14 rounded-xl bg-blue-50 flex items-center justify-center  border border-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 bg-blue-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center ">
                                    P</div>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">{{ Auth::user()->profile->companyName }}
                                    Programs</h1>

                            </div>
                        </div>

                        <button onclick="toggleForm('createForm')"
                            class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            New Program
                        </button>
                    </div>

                    <!-- Create Program Modal -->
                    <div id="createForm"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                        <div class="bg-white rounded-2xl  w-full max-w-2xl border border-gray-200 overflow-hidden">
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <h3 class="text-2xl font-semibold text-gray-900">Create New Bug Bounty Program</h3>
                                <button onclick="toggleForm('createForm')" class="text-gray-400 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <form id="createProgramForm" action="{{ route('createProgram') }}" method="POST"
                                class="p-6 space-y-5">
                                @csrf
                                @include('components.programForm')
                            </form>

                        </div>
                    </div>

                    <!-- Advanced Filters -->
                    <div class="bg-white rounded-2xl  border border-gray-200 p-5 mb-8">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex flex-wrap gap-3">
                                <div class="relative">
                                    <select id="statusFilter"
                                        class="appearance-none pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                        <option value="">All Status</option>
                                        <option value="active">accepted</option>
                                        <option value="draft">rejeted</option>
                                        <option value="paused">Paused</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="relative">
                                    <select id="sortBy"
                                        class="appearance-none pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                        <option value="newest">Newest First</option>
                                        <option value="highest_bounty">Highest Bounty</option>
                                        <option value="most_reports">Most Reports</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="relative w-full md:w-64">
                                <input type="text" placeholder="Search programs..."
                                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-3 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <h1 class="text-2xl font-bold mb-6">Mes Programmes</h1>

                        @if ($programs->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($programs as $program)
                                    <div
                                        class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm transition-all hover:shadow-md">
                                        <!-- Header -->
                                        <div class="flex items-center gap-4 mb-4">
                                            <div
                                                class="h-12 w-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-lg font-semibold text-gray-900">{{ $program->title }}</h2>
                                                <p class="text-sm text-gray-500">{{ Str::limit($program->description, 60) }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Body -->
                                        <div class="mb-4 space-y-1 text-sm text-gray-700">
                                            <p><strong>Bounty:</strong> ${{ number_format($program->min_reward) }} -
                                                ${{ number_format($program->max_reward) }}</p>
                                            <p><strong>Reports:</strong> {{ $program->reports_count }}</p>
                                            <p><strong>Status:</strong>
                                                <span
                                                    class="inline-block px-2 py-1 text-xs rounded-full
                                    {{ $program->status === 'rejete'
                                        ? 'bg-red-100 text-black'
                                        : ($program->status === 'accepte'
                                            ? 'bg-green-100 text-black'
                                            : 'bg-gray-100 text-gray-800') }}">
                                                    {{ ucfirst($program->status) }}
                                                </span>
                                            </p>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex justify-between items-center mt-4 text-sm">
                                            <a href="{{ route('programDetails', $program->id) }}">
                                                <i class="fa-solid fa-eye" style="color: #74C0FC;"></i>
                                            </a>
                                            <div class="flex items-center space-x-2">
                                                <button onclick="toggleForm('updateForm')"
                                                    class="text-blue-600 hover:text-blue-800" title="Modifier">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <!-- Create Program Modal -->
                                                <div id="updateForm"
                                                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                                                    <div
                                                        class="bg-white rounded-2xl  w-full max-w-2xl border border-gray-200 overflow-hidden">
                                                        <div
                                                            class="flex items-center justify-between p-6 border-b border-gray-200">
                                                            <h3 class="text-2xl font-semibold text-gray-900">Update New Bug
                                                                Bounty Program</h3>
                                                            <button onclick="toggleForm('updateForm')"
                                                                class="text-gray-400 hover:text-gray-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <form id="createProgramForm"
                                                            action="{{ route('entreprise_program_edit', $program->id) }}" method="POST"
                                                            class="p-6 space-y-5">
                                                            @csrf
                                                            @include('components.programForm')
                                                        </form>

                                                    </div>
                                                </div>
                                                <form action="{{ route('entreprise_program_delete', $program->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($program->status === 'rejete')
                                                        <button class="text-red-600 hover:text-red-800">
                                                            <i class="fas fa-ban text-lg"></i>
                                                        </button>
                                                    @elseif ($program->status === 'accepte')
                                                        <button class="text-green-600 hover:text-green-800">
                                                            <i class="fas fa-check-circle text-lg"></i>
                                                        </button>
                                                    @else
                                                        <button class="text-yellow-500 hover:text-yellow-700">
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
                            <p class="text-gray-600">Aucun programme disponible.</p>
                        @endif
                    </div>
                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $programs->appends(request()->query())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/entreprises/program.js') }}"></script>
@endsection
