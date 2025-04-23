@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gray-50">
    @include('partials.entreprise.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.entreprise.header')
        
        <main class="flex-1 overflow-auto bg-gradient-to-br from-white to-gray-50 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Security Header with Program Stats -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="h-14 w-14 rounded-xl bg-blue-50 flex items-center justify-center shadow-inner border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="absolute -bottom-2 -right-2 bg-blue-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center shadow">MS</div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Microsoft Security Programs</h1>
                            <div class="flex gap-4 mt-1">
                                <span class="flex items-center text-sm text-gray-600">
                                    <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span> 12 Active
                                </span>
                                <span class="flex items-center text-sm text-gray-600">
                                    <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span> 8 In Review
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <button onclick="toggleForm('createForm')" 
                            class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Program
                    </button>
                </div>

                <!-- Create Program Modal -->
                <div id="createForm" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl border border-gray-200 overflow-hidden">
                        <div class="flex items-center justify-between p-5 border-b border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900">Create New Bug Bounty Program</h3>
                            <button onclick="toggleForm('createForm')" class="text-gray-400 hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form id="createProgramForm" action="{{ route('createProgram') }}" method="POST" class="p-5 space-y-4">
                            @csrf
                            @include('components.programForm')
                        </form>
                    </div>
                </div>

                <!-- Advanced Filters -->
                <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex flex-wrap gap-3">
                            <div class="relative">
                                <select id="statusFilter" class="appearance-none pl-3 pr-8 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">All Status</option>
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                    <option value="paused">Paused</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                            
                            
                            <div class="relative">
                                <select id="sortBy" class="appearance-none pl-3 pr-8 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="newest">Newest First</option>
                                    <option value="highest_bounty">Highest Bounty</option>
                                    <option value="most_reports">Most Reports</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                            
                            <button onclick="applyFilters()" class="flex items-center gap-1 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Apply
                            </button>
                        </div>
                        
                        <div class="relative w-full md:w-64">
                            <input type="text" placeholder="Search programs..." class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Programs Table -->
                <div class="bg-white rounded-xl shadow-xs overflow-hidden border border-gray-200">
                    @if($programs->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bounty Range</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reports</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($programs as $program)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $program->title }}</div>
                                                <div class="text-sm text-gray-500">{{ Str::limit($program->description, 30) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        ${{ number_format($program->min_reward) }}  -  ${{ number_format($program->max_reward) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-1.5 mr-2">
                                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ min(($program->reports_count / 50) * 100, 100) }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-900">{{ $program->reports_count  }}  0</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                                            {{ $program->status === 'active' ? 'bg-green-100 text-green-800' : 
                                               ($program->status === 'paused' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($program->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('programDetails', $program->id) }}" class="text-green-600">view</a>
                                            <button onclick="openUpdateForm(this)" 
                                                    data-id="{{ $program->id }}"
                                                    data-title="{{ $program->title }}"
                                                    data-description="{{ $program->description }}"
                                                    data-type="{{ $program->type }}"
                                                    data-status="{{ $program->status }}"
                                                    data-min_reward="{{ $program->min_reward }}"
                                                    data-max_reward="{{ $program->max_reward }}"
                                                    class="text-blue-600 hover:text-blue-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button onclick="deleteProgram({{ $program->id }})" class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        
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
                    </div>
                </div>
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $programs->appends(request()->query())->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    const csrfToken = "{{ csrf_token() }}";

    function toggleForm(id) {
        const el = document.getElementById(id);
        el.classList.toggle('hidden');
        el.classList.toggle('flex');
    }

    // document.getElementById('createProgramForm').addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     const form = e.target;

    //     fetch('{{ route("createProgram") }}', {
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken,
    //             'Accept': 'application/json',
    //             'Content-Type': 'application/json',
    //         },
    //         body: JSON.stringify(Object.fromEntries(new FormData(form)))
    //     })
    //     .then(res => res.json())
    //     .then(data => {
    //         toggleForm('createForm');
    //         reloadPrograms();
    //         form.reset();
    //     })
    //     .catch(error => console.error('Error:', error));
    // });

    function openUpdateForm(button) {
        const form = document.getElementById("updateProgramForm");
        form.dataset.id = button.dataset.id;
        form.querySelector('input[name="title"]').value = button.dataset.title;
        form.querySelector('textarea[name="description"]').value = button.dataset.description;
        form.querySelector('select[name="status"]').value = button.dataset.status;
        form.querySelector('input[name="min_reward"]').value = button.dataset.min_reward;
        form.querySelector('input[name="max_reward"]').value = button.dataset.max_reward;

        toggleForm('updateForm');
    }

    document.getElementById('updateProgramForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = e.target;
        const id = form.dataset.id;

        fetch(`/tr/programs/${id}/update`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(Object.fromEntries(new FormData(form)))
        })
        .then(res => res.json())
        .then(data => {
            toggleForm('updateForm');
            reloadPrograms();
        })
        .catch(error => console.error('Error:', error));
    });

    function deleteProgram(id) {
        if (confirm("Are you sure you want to delete this program?")) {
            fetch(`/tr/programs/${id}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                reloadPrograms();
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function applyFilters() {
        const status = document.getElementById('statusFilter').value;
        const sort = document.getElementById('sortBy').value;

        fetch(`/tr/programs/filter?status=${status}&sort=${sort}`, {
            headers: {
                'Accept': 'text/html'
            }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('programTable').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    }

    function reloadPrograms() {
        fetch(`/tr/programs/list`, {
            headers: {
                'Accept': 'text/html'
            }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('programTable').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection