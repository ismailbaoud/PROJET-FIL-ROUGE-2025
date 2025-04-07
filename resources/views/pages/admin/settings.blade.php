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
        <h2 class="text-lg font-medium text-gray-900">Paramètres</h2>
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
            <div class="p-6  min-h-screen">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Paramètres de Configuration</h1>

                <!-- General Settings Section -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Paramètres Généraux</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="site-name" class="block text-sm font-medium text-gray-700">Nom du Site</label>
                            <input type="text" id="site-name" class="mt-1 p-2 border rounded-md w-full" placeholder="Nom du site" />
                        </div>
                        <div>
                            <label for="site-email" class="block text-sm font-medium text-gray-700">Email du Site</label>
                            <input type="email" id="site-email" class="mt-1 p-2 border rounded-md w-full" placeholder="contact@example.com" />
                        </div>
                    </div>
                </div>

                <!-- Security Settings Section -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Paramètres de Sécurité</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password-policy" class="block text-sm font-medium text-gray-700">Politique de Mot de Passe</label>
                            <select id="password-policy" class="mt-1 p-2 border rounded-md w-full">
                                <option value="strong">Fort</option>
                                <option value="medium">Moyenne</option>
                                <option value="weak">Faible</option>
                            </select>
                        </div>
                        <div>
                            <label for="two-factor" class="block text-sm font-medium text-gray-700">Authentification à Deux Facteurs</label>
                            <select id="two-factor" class="mt-1 p-2 border rounded-md w-full">
                                <option value="enabled">Activée</option>
                                <option value="disabled">Désactivée</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Email Settings Section -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Paramètres de Notification Email</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="email-notifications" class="block text-sm font-medium text-gray-700">Notifications par Email</label>
                            <select id="email-notifications" class="mt-1 p-2 border rounded-md w-full">
                                <option value="enabled">Activées</option>
                                <option value="disabled">Désactivées</option>
                            </select>
                        </div>
                        <div>
                            <label for="smtp-server" class="block text-sm font-medium text-gray-700">Serveur SMTP</label>
                            <input type="text" id="smtp-server" class="mt-1 p-2 border rounded-md w-full" placeholder="smtp.example.com" />
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="mt-6">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Sauvegarder les Paramètres
                    </button>
                </div>
            </div>
        </div>
      </main>
    </div>
  </div>
@endsection