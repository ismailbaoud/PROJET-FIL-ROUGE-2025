@extends('layouts.app')

@Section('main')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="flex w-full justify-center items-center gap-20  flex-col flex-row">
            <!-- Login Form Card -->
            <div class="w-full max-w-md mx-auto lg:mx-0 p-8 ">
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-bold text-[#000000]">Secure the Web. Join the Hunt.</h1>
                    <p class="mt-2 text-[#6b7280]">
                        Log in to HappyHunt and start hunting or managing your security program.
                    </p>
                </div>

                <form class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#374151]">
                            Email Address
                        </label>
                        <input id="email" type="email"
                            class="mt-1 block w-full rounded-md border border-[#d1d5db] px-3 py-2  focus:border-[#3b82f6] focus:outline-none focus:ring-1 focus:ring-[#3b82f6]" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-[#374151]">
                            Password
                        </label>
                        <input id="password" type="password"
                            class="mt-1 block w-full rounded-md border border-[#d1d5db] px-3 py-2  focus:border-[#3b82f6] focus:outline-none focus:ring-1 focus:ring-[#3b82f6]" />
                    </div>

                    <div class="flex justify-end">
                        <a href="#" class="text-sm text-[#3b82f6] hover:underline">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full rounded-md bg-black py-2 px-4 text-white hover:bg-[#202020] focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">
                        Log In
                    </button>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-[#e5e7eb]"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-[#6b7280]">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button type="button"
                            class="flex w-full items-center justify-center rounded-md border border-[#374151] bg-[#202020] py-2 px-4 text-white  hover:bg-[#263238]">
                            Sign up with GitHub
                        </button>
                        <button type="button"
                            class="flex w-full items-center justify-center rounded-md border border-[#e16e52] bg-[#e16e52] py-2 px-4 text-white  hover:bg-[#e16e52]/90">
                            Sign up with Google
                        </button>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-[#6b7280]">
                    New to HappyHunt? <a href="#" class="text-[#3b82f6] hover:underline">Start your journey today</a>
                </p>

                <div class="mt-6 text-center text-xs text-[#6b7280]">
                    <p>Your security is our priority</p>
                    <p class="mt-1">
                        <a href="#" class="text-[#3b82f6] hover:underline">GDPR Compliance</a> | <a href="#"
                            class="text-[#3b82f6] hover:underline">Safe Harbor Policy</a>
                    </p>
                </div>
            </div>

            <!-- Illustration -->
                <div class="w-[40%] md:w-[30%] flex justify-center">
                    <img src="{{ asset('images/login.svg') }}" alt="Sign Up" >
                </div>
        </div>

    </div>
@endsection
