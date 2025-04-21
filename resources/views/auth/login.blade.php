@extends('layouts.app')

@Section('main')
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center p-4 space-y-6 md:space-y-0 md:space-x-20">
        <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-black">Secure the Web. Join the Hunt.</h1>
                <p class="mt-2 text-gray-600">Log in to HappyHunt and start hunting or managing your security program.</p>
            </div>

            <form action="{{ route('login') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" />
                </div>

                <div class="flex justify-end">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full rounded-md bg-black py-2 px-4 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                    Log In
                </button>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white px-2 text-gray-600">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button type="button"
                        class="flex w-full items-center justify-center rounded-md border border-gray-700 bg-gray-900 py-2 px-4 text-white hover:bg-gray-800">
                        Sign up with GitHub
                    </button>
                    <button type="button"
                        class="flex w-full items-center justify-center rounded-md border border-red-500 bg-red-500 py-2 px-4 text-white hover:bg-red-600">
                        Sign up with Google
                    </button>
                </div>
            </div>

            <p class="mt-6 text-center text-sm text-gray-600">
                New to HappyHunt? <a href="#" class="text-blue-500 hover:underline">Start your journey today</a>
            </p>

            <div class="mt-6 text-center text-xs text-gray-600">
                <p>Your security is our priority</p>
                <p class="mt-1">
                    <a href="#" class="text-blue-500 hover:underline">GDPR Compliance</a> | <a href="#"
                        class="text-blue-500 hover:underline">Safe Harbor Policy</a>
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/3 flex justify-center">
            <img src="{{ asset('images/login.svg') }}" alt="Sign Up" class="max-w-full h-auto">
        </div>
    </div>
@endsection
