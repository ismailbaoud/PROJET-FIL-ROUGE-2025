@extends('layouts.app')


@Section('main')
    <div class="flex h-screen bg-gray-100">
        <div class="w-64 bg-white h-full flex flex-col">
            <div class="p-6 font-bold text-[#111827]">
                Admin Panel
            </div>
            @include('partials.admin.sidebar')
        </div>

        <div class="flex-1 flex flex-col bg-gradient-to-r from-white via-white via-5% to-[#E8F5E9]">
            <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                <h2 class="text-lg font-medium text-gray-900">Logs</h2>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">Admin</span>
                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                        A
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-7xl mx-auto">
                    <div class="p-6 min-h-screen">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">Journal des Logs</h1>

                        <div class="mb-4 flex flex-col md:flex-row md:justify-between">
                            <input type="text" placeholder="🔍 Rechercher un log..."
                                class="p-2 border rounded-md w-full md:w-1/3 mb-2 md:mb-0">
                            <select class="p-2 border rounded-md w-full md:w-1/4">
                                <option value="">📌 Filtrer par niveau</option>
                                <option value="info">ℹ️ Information</option>
                                <option value="warning">⚠️ Avertissement</option>
                                <option value="error">❌ Erreur</option>
                            </select>
                        </div>

                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="w-full border-collapse">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="p-3 text-left">ID Log</th>
                                        <th class="p-3 text-left">Niveau</th>
                                        <th class="p-3 text-left">Message</th>
                                        <th class="p-3 text-left">Utilisateur</th>
                                        <th class="p-3 text-left">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="p-3">LOG12345</td>
                                        <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-blue-500">ℹ️
                                                Information</span></td>
                                        <td class="p-3">Utilisateur connecté avec succès</td>
                                        <td class="p-3">John Doe</td>
                                        <td class="p-3">2025-03-15 10:00</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="p-3">LOG12346</td>
                                        <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-yellow-500">⚠️
                                                Avertissement</span></td>
                                        <td class="p-3">Tentative de connexion échouée</td>
                                        <td class="p-3">Jane Smith</td>
                                        <td class="p-3">2025-03-15 12:30</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="p-3">LOG12347</td>
                                        <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-red-500">❌
                                                Erreur</span></td>
                                        <td class="p-3">Erreur de base de données</td>
                                        <td class="p-3">Admin</td>
                                        <td class="p-3">2025-03-15 13:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                Ajouter un Log
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
