@extends('layouts.app')


@Section('main')
    <div class="flex h-screen bg-gray-100">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            @include('partials.admin.header')
            <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-white via-white via-5% to-[#E8F5E9]">
                <div class="max-w-7xl mx-auto">
                    <form action="{{ route('adminSettingsUpdate' ,Auth::User()) }}">

                        <div class="p-6  min-h-screen">
                            <h1 class="text-2xl font-bold text-gray-800 mb-6">Paramètres de Configuration</h1>

                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 mb-4">Paramètres Généraux</h2>
                                <div class="grid grid-rows-1 md:grid-rows-2 gap-4">
                                    <div>
                                        <label for="userName" class="block text-sm font-medium text-gray-700">Admin
                                            Name</label>
                                        <input type="text" id="userName" name="userName" class="mt-1 p-2 border rounded-md w-1/2"
                                            value="{{ Auth::user()->userName }}" />
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Admin
                                            Email</label>
                                        <input type="email" id="email" name="email" class="mt-1 p-2 border rounded-md w-1/2"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Sauvegarder les Paramètres
                                </button>
                            </div>
                    </form>
                </div>
        </div>
        </main>
    </div>
    </div>
@endsection
