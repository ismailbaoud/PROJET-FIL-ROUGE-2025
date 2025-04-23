@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-gray-50">
    @if (Auth::user()->role == 'hunter')
        
    @include('partials.hunter.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')
        
        @elseif(Auth::user()->role == 'entreprise')
        @include('partials.entreprise.sidebar')
    
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')
        @endif
        <main class="flex-1 overflow-auto p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Program Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            {{ $program->title }}
                        </h1>
                        <div class="flex items-center gap-4 mt-2">
                            <span class="text-xs font-medium capitalize px-2 py-1 rounded-full 
                                {{ $program->status === 'accepte' ? 'bg-green-100 text-green-800' : 
                                   ($program->status === 'rejete' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ $program->status }}
                            </span>
                            <span class="text-sm text-gray-600">
                                Reward: ${{ number_format($program->min_reward, 0) }} - ${{ number_format($program->max_reward, 0) }}
                            </span>
                        </div>
                    </div>
                    
                    @if ($user->role == 'hunter' && !$isJoined)
                    <form action="/programs/{{ $program->id }}/join" method="POST">
                        @csrf
                        <button class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Join Program
                        </button>
                    </form>
                        {{-- <div class="px-4 py-2 bg-green-100 text-green-800 rounded-lg flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            You are participating in this program
                        </div> --}}

                        <!-- ✅ Submit Report Button -->
                       
                    @elseif ($user->role == 'hunter' && $isJoined)
                    <div class="px-4 py-2 bg-green-100 text-green-800 rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        You are participating in this program
                    </div>
                    <a href="{{ route('hunter_report_submit', $program->id) }}" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0A9 9 0 113 12a9 9 0 0118 0z" />
                        </svg>
                        Submit Report
                    </a>
                    @endif
                </div>

                <!-- Program Details -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-1 space-y-6">
                        <!-- Description Card -->
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Program Description
                            </h2>
                            <p class="text-gray-700">
                                {{ $program->description }}
                            </p>
                        </div>

                        <!-- Entreprise Card -->
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Entreprise Details
                            </h2>
                            <div class="space-y-2">
                                <p class="text-gray-700"><span class="font-medium">Name:</span> {{ $program->entreprise->userName }}</p>
                                <p class="text-gray-700"><span class="font-medium">Email:</span> {{ $program->entreprise->email }}</p>
                            </div>
                        </div>

                        @if ($user->role == 'entreprise')
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Scope Management
                                </h2>
                                <button onclick="toggleForm('createForm')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    New Scope
                                </button>
                            </div>

                            <form action="{{ route('scopes.store', $program->id) }}" method="POST" id="createForm" class="space-y-4 bg-gray-50 p-6 rounded-lg hidden">
                                @csrf
                                @include('components.scopeForm')
                            </form>

                            <div class="hidden" id="updateForm">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Scope</h3>
                                <form action="{{ route('scopes.update', $program->id) }}" method="POST" class="space-y-4 bg-gray-50 p-6 rounded-lg">
                                    @csrf
                                    @method('PUT')
                                    @include('components.scopeForm')
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Scope Lists -->
                    @if ($isJoined || $user->role == 'entreprise')
                    <div class="lg:col-span-2 space-y-6">
                        <!-- In Scope -->
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    In Scope
                                </h2>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3">Target</th>
                                                <th class="px-4 py-3">Type</th>
                                                <th class="px-4 py-3">instructions</th>
                                                <th class="px-4 py-3">ceverity</th>
                                                <th class="px-4 py-3">created_at</th>
                                                @if ($user->role == 'entreprise')
                                                <th class="px-4 py-3">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inScope as $scope)
                                            <tr class="border-b hover:bg-gray-50">
                                                <td class="px-4 py-3">{{ $scope->target }}</td>
                                                <td class="px-4 py-3">{{ $scope->target_type }}</td>
                                                <td class="px-4 py-3">{{ $scope->instructions }}</td>
                                                <td class="px-4 py-3">{{ $scope->created_at }}</td>
                                                @if ($user->role == 'entreprise')
                                                <td class="px-4 py-3 space-x-2">
                                                    <button onclick="toggleForm('updateForm')" class="text-red-600 hover:text-red-800 text-sm">Edit</button>
                                                    <form action="{{ route('scopes.destroy', $scope->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Out of Scope -->
                        <div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Out of Scope
                                </h2>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3">Target</th>
                                                <th class="px-4 py-3">Type</th>
                                                <th class="px-4 py-3">instructions</th>
                                                <th class="px-4 py-3">created_at</th>
                                                @if ($user->role == 'entreprise')
                                                <th class="px-4 py-3">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($outOfScope as $scope)
                                            <tr class="border-b hover:bg-gray-50">
                                                <td class="px-4 py-3">{{ $scope->target }}</td>
                                                <td class="px-4 py-3">{{ $scope->target_type }}</td>
                                                <td class="px-4 py-3">{{ $scope->instructions }}</td>
                                                <td class="px-4 py-3">{{ $scope->created_at }}</td>
                                                @if ($user->role == 'entreprise')
                                                <td class="px-4 py-3 space-x-2">
                                                    <a href="{{ route('scopes.edit', $scope->id) }}" class="text-red-600 hover:text-red-800 text-sm">Edit</a>
                                                    <form action="{{ route('scopes.destroy', $scope->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function toggleForm(id) {
        const el = document.getElementById(id);
        if (el.classList.contains('hidden')) {
            el.classList.remove('hidden');
        } else {
            el.classList.add('hidden');
        }
    }
</script>
@endsection