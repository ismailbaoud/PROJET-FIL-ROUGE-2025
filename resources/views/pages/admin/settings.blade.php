@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
    @include('partials.admin.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.admin.header')
        <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="max-w-7xl mx-auto">
                <form action="{{ route('adminSettingsUpdate', Auth::User()) }}">
                    <div class="p-6 min-h-screen">
                        <h1 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                            <i class="fas fa-cogs text-blue-400"></i>
                            Configuration Settings
                        </h1>

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-200 mb-4">General Settings</h2>
                            <div class="grid grid-rows-1 md:grid-rows-2 gap-4">
                                <div>
                                    <label for="userName" class="block text-sm font-medium text-gray-400 flex items-center gap-2">
                                        <i class="fas fa-user text-blue-400"></i>
                                        Admin Name
                                    </label>
                                    <input type="text" id="userName" name="userName"
                                           class="mt-1 p-2 border border-gray-600 rounded-lg w-full md:w-1/2 bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                                           value="{{ Auth::user()->username }}" />
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-400 flex items-center gap-2">
                                        <i class="fas fa-envelope text-blue-400"></i>
                                        Admin Email
                                    </label>
                                    <input type="email" id="email" name="email"
                                           class="mt-1 p-2 border border-gray-600 rounded-lg w-full md:w-1/2 bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                                           value="{{ Auth::user()->email }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center gap-2 transition-all duration-300 shadow-sm">
                                <i class="fas fa-save"></i>
                                Save Settings
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection