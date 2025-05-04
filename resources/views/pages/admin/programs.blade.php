@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
    @include('partials.admin.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.admin.header')

        <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="max-w-7xl mx-auto">
                <div class="p-6 min-h-screen">
                    <h1 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                        <i class="fas fa-bug text-blue-400"></i>
                        Bug Bounty Programs
                    </h1>

                    <div class="mb-4 flex flex-col md:flex-row md:justify-between">
                        <div class="relative w-full md:w-1/3 mb-2 md:mb-0">
                            <input type="text" placeholder="Search for a program..."
                                   class="p-2 pl-10 border border-gray-600 rounded-lg w-full bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                        </div>
                        <select class="p-2 border border-gray-600 rounded-lg w-full md:w-1/4 bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                            <option value="">Filter by status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>

                    <div class="bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-600">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="p-3 text-left text-gray-200">Name</th>
                                    <th class="p-3 text-left text-gray-200">Company</th>
                                    <th class="p-3 text-left text-gray-200">Rewards</th>
                                    <th class="p-3 text-left text-gray-200">Status</th>
                                    <th class="p-3 text-left text-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                    <tr class="border-b border-gray-600 hover:bg-gray-700/50 transition-all duration-300">
                                        <td class="p-3 text-white">{{ $program->title }}</td>
                                        <td class="p-3 text-gray-200">{{ $program->entreprise->userName }}</td>
                                        <td class="p-3 text-blue-400">${{ $program->total_rewards ?? '0.00' }}</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 rounded-md text-blue-400 bg-blue-600/20">{{ $program->status }}</span>
                                        </td>
                                        <td class="p-3 flex space-x-2">
                                            <div class="flex justify-end space-x-2">
                                                <form action="{{ route('updateProgram', $program->id) }}" method="POST" id="updateStatus-{{ $program->id }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" id="selectItem-{{ $program->id }}"
                                                            class="p-1 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                                                        <option value="accepted" {{ $program->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="pending" {{ $program->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="rejected" {{ $program->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </form>
                                                <a href="{{ route('deleteProgram', $program->id) }}"
                                                   class="flex items-center gap-1 px-2 py-1 text-sm font-semibold text-red-400 hover:text-red-300 transition-all duration-300">
                                                    <i class="fas fa-ban"></i>
                                                    Suspend
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="{{ asset('js/admin/program.js') }}" defer></script>
@endsection