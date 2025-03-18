@extends('layouts.app')

@Section('main')
    <div class=" flex justify-center h-screen items-center">
        <div class=" w-full space-y-8" style="width: 60%">
            <div class="text-center">
                <h2 class="mt-6 text-2xl font-bold text-gray-900">Create Your Hunter Account</h2>
            </div>
            <div class="mt-8 space-y-6">
                <div class="flex gap-4">
                    <button
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-gray-900 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Sign up with GitHub
                    </button>
                    <button
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Sign up with Google
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6" style=" gap: 10px ">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" id="username" name="username"
                            class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email"
                            class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4" style=" gap: 10px">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                            Password</label>
                        <input type="password" id="confirm-password" name="confirm-password"
                            class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div class="mt-4 space-y-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">I agree to Terms & Responsible
                                Disclosure Policy</label>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="2fa" name="2fa" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="2fa" class="font-medium text-gray-700">Enable Two-Factor Authentication
                                (Recommended)</label>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-gray-900 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Join the Hunt
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
