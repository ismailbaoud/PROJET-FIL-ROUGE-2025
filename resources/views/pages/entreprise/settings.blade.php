@extends('layouts.app')

@section('main')
    <div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.entreprise.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.entreprise.header')
            <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="max-w-4xl mx-auto">
                    <!-- Header -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Account Settings
                                </h1>
                                <p class="text-gray-400 mt-1">Manage your account preferences and security settings</p>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-600 mb-8">
                        <div class="px-6 py-4 border-b border-gray-600">
                            <h2 class="text-lg font-semibold text-white">Profile Information</h2>
                            <p class="text-sm text-gray-400 mt-1">Update your personal details and profile picture</p>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-col md:flex-row gap-6 mb-6">
                                <div class="flex-1">
                                    <form action="{{ route('Entreprise_settings_update') }}" method="POST" class="space-y-4">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label for="first-name" class="block text-sm font-medium text-gray-400 mb-2">User Name</label>
                                                <input type="text" id="first-name" name="userName" value="{{ $user->userName }}"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                            </div>
                                            <div>
                                                <label for="email" class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                                                <p id="email"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200">{{ $user->email }}</p>
                                            </div>
                                            <div>
                                                <label for="company-name" class="block text-sm font-medium text-gray-400 mb-2">Company Name</label>
                                                <input type="text" id="company-name" name="companyName" value="{{ $profile->companyName }}"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                            </div>
                                            <div>
                                                <label for="company-url" class="block text-sm font-medium text-gray-400 mb-2">Company URL</label>
                                                <input type="text" id="company-url" name="companyUrl" value="{{ $profile->companyUrl }}"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                            </div>
                                            <div>
                                                <label for="country" class="block text-sm font-medium text-gray-400 mb-2">Country</label>
                                                <input type="text" id="country" name="country" value="{{ $profile->country }}"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                            </div>
                                            <div>
                                                <label for="state" class="block text-sm font-medium text-gray-400 mb-2">State</label>
                                                <input type="text" id="state" name="state" value="{{ $profile->state }}"
                                                    class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                            </div>
                                        </div>
                                        <button type="submit" class="px-6 w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-300 shadow-sm">
                                            Save Changes
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="bg-gray-800 rounded-xl shadow-lg border border-red-500/50 mb-8">
                        <div class="px-6 py-4 border-b border-red-500/50 bg-red-900/20">
                            <h2 class="text-lg font-semibold text-red-400">Danger Zone</h2>
                            <p class="text-sm text-red-400 mt-1">These actions are irreversible</p>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6">
                                <div class="pt-6 border-t border-gray-600 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <div class="mb-4 sm:mb-0">
                                        <h3 class="text-sm font-medium text-red-400">Delete Account</h3>
                                        <p class="text-sm text-gray-400 mt-1">Permanently delete your account and all associated data. This action cannot be undone.</p>
                                    </div>
                                    <form id="delete-form" action="{{ route('Entreprise_settings_delete') }}" method="get">
                                        <a id="deleteButton" class="px-4 py-2 bg-gray-700 border border-red-500 text-red-400 rounded-lg hover:bg-red-900/20 text-sm sm:w-auto w-full transition-all duration-300">
                                            Delete Account
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        let deleteButton = document.getElementById('deleteButton');
        deleteButton.addEventListener('click', (e) => {
            e.preventDefault();
            const confirmDelete = confirm('Are you sure you want to delete your account?');
            if (confirmDelete) {
                document.getElementById('delete-form').submit();
            }
        });
    </script>
@endsection