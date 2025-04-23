@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gray-50">
    @include('partials.entreprise.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.entreprise.header')
        
        <main class="flex-1 overflow-auto bg-gradient-to-br from-white to-gray-50 p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Account Settings
                            </h1>
                            <p class="text-gray-600 mt-1">Manage your account preferences and security settings</p>
                        </div>
                        
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="bg-white rounded-xl shadow-xs border border-gray-200 mb-8">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Profile Information</h2>
                        <p class="text-sm text-gray-500 mt-1">Update your personal details and profile picture</p>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-6 mb-6">
                            <div class="flex-shrink-0">
                                <div class="relative">
                                    <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-2xl font-medium">
                                        IB
                                    </div>
                                    <button class="absolute -bottom-2 -right-2 bg-white p-1.5 rounded-full shadow-sm border border-gray-300 hover:bg-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3 flex justify-center md:justify-start space-x-2">
                                    <button class="text-xs text-blue-600 hover:text-blue-800">Upload</button>
                                    <button class="text-xs text-gray-500 hover:text-gray-700">Remove</button>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs text-gray-500 mb-4">
                                    Recommended dimensions: 200x200 pixels. Maximum file size: 5MB.
                                </p>
                                <form action="{{ route('Entreprise_settings_update') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">User Name</label>
                                            <input type="text" id="first-name" name="userName" value="{{ $user->userName }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                            <p  id="email" 
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $user->email }} </p>
                                        </div>
                                        <div>
                                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                            <input type="text" id="first-name" name="companyName" value="{{ $profile->companyName }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2"> Company Url</label>
                                            <input type="text" id="email" name="companyUrl" value="{{ $profile->companyUrl }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">country</label>
                                            <input type="text" id="first-name" name="country" value="{{ $profile->country }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">state</label>
                                            <input type="text" id="email" name="state" value="{{ $profile->state }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                    <button type="submit" class="px-6 w-full py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-white rounded-xl shadow-xs border border-red-200 mb-8">
                    <div class="px-6 py-4 border-b border-red-200 bg-red-50">
                        <h2 class="text-lg font-semibold text-red-800">Danger Zone</h2>
                        <p class="text-sm text-red-600 mt-1">These actions are irreversible</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="mb-4 sm:mb-0">
                                    <h3 class="text-sm font-medium text-red-600">Delete Account</h3>
                                    <p class="text-sm text-gray-500 mt-1">Permanently delete your account and all associated data. This action cannot be undone.</p>
                                </div>
                                <button class="px-4 py-2 bg-white border border-red-300 text-red-600 rounded-lg hover:bg-red-50 text-sm sm:w-auto w-full">
                                    Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection