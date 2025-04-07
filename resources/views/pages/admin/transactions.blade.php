@extends('layouts.app')


@Section('main')
  <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <div class="w-64 bg-gray-100 h-full flex flex-col">
        <div class="p-6 font-bold text-[#111827]">
          Admin Panel
        </div>
      @include('partials.admin.sidebar')
      </div>
  
    <!-- Main Content -->
    <div class="flex-1 flex flex-col bg-gradient-to-r from-white via-white via-5% to-[#E8F5E9]">
      <!-- Header -->
      <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
        <h2 class="text-lg font-medium text-gray-900">Transactions</h2>
        <div class="flex items-center gap-3">
          <span class="text-sm text-gray-600">Admin</span>
          <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
            A
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
        <div class="max-w-7xl mx-auto">
            <div class="p-6 min-h-screen">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Gestion des Transactions</h1>

                <!-- Search & Filter -->
                <div class="mb-4 flex flex-col md:flex-row md:justify-between">
                    <input type="text" placeholder="🔍 Rechercher une transaction..." class="p-2 border rounded-md w-full md:w-1/3 mb-2 md:mb-0">
                    <select class="p-2 border rounded-md w-full md:w-1/4">
                        <option value="">📌 Filtrer par statut</option>
                        <option value="completed">🟢 Complétée</option>
                        <option value="pending">🟡 En Attente</option>
                        <option value="failed">🔴 Échouée</option>
                    </select>
                </div>

                <!-- Table -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="p-3 text-left">ID Transaction</th>
                                <th class="p-3 text-left">Utilisateur</th>
                                <th class="p-3 text-left">Montant</th>
                                <th class="p-3 text-left">Statut</th>
                                <th class="p-3 text-left">Date</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">TX12345</td>
                                <td class="p-3">John Doe</td>
                                <td class="p-3">$500</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-green-500">Complétée</span></td>
                                <td class="p-3">2025-03-15</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500">✏️ Modifier</a>
                                    <button class="text-red-500">🗑️ Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">TX12346</td>
                                <td class="p-3">Jane Smith</td>
                                <td class="p-3">$200</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-yellow-500">En Attente</span></td>
                                <td class="p-3">2025-03-16</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500">✏️ Modifier</a>
                                    <button class="text-red-500">🗑️ Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">TX12347</td>
                                <td class="p-3">Mark Johnson</td>
                                <td class="p-3">$1,000</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-md text-white bg-red-500">Échouée</span></td>
                                <td class="p-3">2025-03-17</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="#" class="text-blue-500">✏️ Modifier</a>
                                    <button class="text-red-500">🗑️ Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Add Transaction Button -->
                <div class="mt-6">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        ➕ Ajouter une Transaction
                    </a>
                </div>
            </div>
        </div>
      </main>
    </div>
  </div>
@endsection
