@extends('layouts.app')


@Section('main')

    <div class="flex h-screen bg-gray-100">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            @include('partials.admin.header')


            <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-white via-white via-5% to-[#E8F5E9]">
                <div class="max-w-7xl mx-auto">
                    <div class="p-6 min-h-screen">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">Programmes de Bug Bounty</h1>

                        <div class="mb-4 flex flex-col md:flex-row md:justify-between">
                            <input type="text" placeholder="🔍 Rechercher un programme..."
                                class="p-2 border rounded-md w-full md:w-1/3 mb-2 md:mb-0">
                            <select class="p-2 border rounded-md w-full md:w-1/4">
                                <option value=""> Filtrer par statut</option>
                                <option value="open"> Ouvert</option>
                                <option value="closed"> Fermé</option>
                                <option value="pending"> En Attente</option>
                            </select>
                        </div>

                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="w-full border-collapse">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="p-3 text-left">Nom</th>
                                        <th class="p-3 text-left">Entreprise</th>
                                        <th class="p-3 text-left">Récompenses</th>
                                        <th class="p-3 text-left">Statut</th>
                                        <th class="p-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $programs as $program )
                                        
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="p-3">{{ $program->title }}</td>
                                        <td class="p-3">{{ $program->entreprise->userName }}</td>
                                        
                                        <td class="p-3">${{ $program->total_rewards ?? '0.00' }}</td>
                                        <td class="p-3"><span
                                            class="px-2 py-1 rounded-md text-green-500">{{ $program->status }}</span></td>
                                        <td class="p-3 flex space-x-2">
                                            <div class="flex justify-end space-x-2">
                                                <form action="{{ route('updateProgram', $program->id) }}" method="POST" id="updateStatus-{{ $program->id }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" id="selectItem-{{ $program->id }}">
                                                        <option value="accepte" {{ $program->status === 'accepte' ? 'selected' : '' }}>accepte</option>
                                                        <option value="panding" {{ $program->status === 'panding' ? 'selected' : '' }}>Panding</option>
                                                        <option value="rejete" {{ $program->status === 'rejete' ? 'selected' : '' }}>Rejete</option>
                                                    </select>
                                                </form>
                                                <a href="{{  route('deleteProgram' ,$program->id) }}" class="text-red-600 hover:text-red-900">Suspend</a>
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
