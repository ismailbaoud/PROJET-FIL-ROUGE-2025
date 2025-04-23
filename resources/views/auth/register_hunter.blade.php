@extends('layouts.app')

@Section('main')
    <div class="flex justify-center items-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-lg space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-2xl font-bold text-gray-900">Create Your Hunter Account</h2>
            </div>
            <div class="mt-8 space-y-6">
                <div class="flex flex-col sm:flex-row gap-4">
                    <button
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-gray-900 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Sign up with GitHub
                    </button>
                    <button
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Sign up with Google
                    </button>
                </div>

                <form action="{{ route('hunterRegister') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="username" name="userName"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password"
                                class="block  mt-4 text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mt-4 text-sm font-medium text-gray-700 mb-1">Confirm
                                Password</label>
                            <input type="password" id="confirm-password" name="confirm-password"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="passwocountryrd"
                                class="block  mt-4 text-sm font-medium text-gray-700 mb-1">country</label>
                            <input type="text" id="country" name="country"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="state" class="block mt-4 text-sm font-medium text-gray-700 mb-1">state</label>
                            <input type="text" id="state" name="state"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div class="space-y-4 mt-4">
                        <div class="flex items-start">
                            <input id="terms" name="terms" type="checkbox"
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="terms" class="ml-3 text-sm font-medium text-gray-700">I agree to Terms &
                                Responsible Disclosure Policy</label>
                        </div>
                        <div class="flex items-start">
                            <input id="2fa" name="2fa" type="checkbox"
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="2fa" class="ml-3 text-sm font-medium text-gray-700">Enable Two-Factor
                                Authentication (Recommended)</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full mt-2 py-3 px-4 border border-transparent text-sm font-medium rounded bg-gray-900 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Join the Hunt
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
