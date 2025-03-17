@extends('layouts.app')

@Section('main')
    <div class="flex-row flex items-center justify-center h-screen p-4">
        <div class="w-1/2 flex flex-col  bg-white rounded-lg">
            <!-- Login Form Section -->
            <div class="w-full w-1/2 p-8 md:p-12">
                <div class="mx-auto">
                    <h1 class="text-2xl md:text-3xl font-bold text-center mb-4">Secure the Web. Join the Hunt.</h1>
                    <p class="text-gray-600 text-center mb-8">Log in to HappyHunt and start hunting or managing your security
                        program.</p>

                    <form>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>

                        <div class="mb-2">
                            <label for="password" class="block text-gray-700 mb-2">Password</label>
                            <input type="password" id="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>

                        <div class="text-right mb-6">
                            <a href="#" class="text-blue-500 hover:underline text-sm">Forgot Password?</a>
                        </div>

                        <button type="submit"
                            class="w-full bg-black text-white py-3 rounded hover:bg-gray-800 transition">Log In</button>
                    </form>

                    <div class="my-6 text-center text-gray-500">Or continue with</div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded hover:bg-gray-50 transition">
                            Google
                        </button>
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded hover:bg-gray-50 transition">
                            GitHub
                        </button>
                    </div>

                    <p class="text-center text-gray-600 mb-6">New to HappyHunt? Start your journey today</p>

                    <div class="text-center text-gray-500 text-sm">
                        <p class="mb-2">Your security is our priority</p>
                        <p>GDPR Compliance | Safe Harbor Policy</p>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="relative w-[30%] h-full flex items-center justify-center ">
            <img src="{{ asset('images/SignUp.svg') }}" alt="">

        </div>
    </div>
@endsection
