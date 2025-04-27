@extends('layouts.app')

@section('main')
    <div
        class="flex flex-col md:flex-row items-center justify-between w-full bg-gradient-to-br from-white via-white via-30% to-[#E8F5E9] p-10 md:p-20">
        <div class="max-w-2xl text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-2">Secure Your Business</h1>
            <h2 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-8">with Ethical Hackers</h2>

            <p class="text-lg md:text-xl text-gray-600 mb-10">Join HackerSquad & Leverage Our Cybersecurity Team!</p>

            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <button class="bg-black text-white px-8 py-3 rounded-lg font-medium text-lg">Get Started</button>
                <p class="text-lg text-gray-600">Already have an account? <a href="#"
                        class="text-gray-900 underline">Sign in</a></p>
            </div>
        </div>
        <div class="w-full md:w-[40%] flex justify-center mt-10 md:mt-0">
            <img src="{{ asset('images/SignUp.svg') }}" alt="Sign Up" class="max-w-full h-auto">
        </div>
    </div>
    <div class="bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
        <div class="w-full max-w-6xl mx-auto px-4 py-8">
            <form action="{{ route('entrepriseRegister') }}" method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                @csrf
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-gray-700">Step 1: Company Details</h2>

                    <div class="space-y-2">
                        <label for="companyName" class="block text-gray-700">Company Name</label>
                        <input id="companyName" name="companyName" type="text"
                            class="w-full h-12 px-3 bg-white rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                        @error('companyName')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="accountUrl" class="block text-gray-700">Account URL</label>
                        <input id="accountUrl" name="companyUrl" type="text"
                            class="w-full h-12 px-3 bg-white rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                            @error('companyUrl')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="country" class="block text-gray-700">Country</label>
                            <input id="country" name="country" type="text"
                                class="w-full h-12 bg-white px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                                @error('country')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                        <div class="space-y-2">
                            <label for="state" class="block text-gray-700">State</label>
                            <input id="state" name="state" type="text"
                                class="w-full h-12 bg-white px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                                @error('state')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-gray-700">Step 2: Security Contact Information</h2>

                    <div class="space-y-2">
                        <label for="fullName" class="block text-gray-700">Full Name</label>
                        <input id="fullName" name="fullName" type="text"
                            class="w-full h-12 px-3 bg-white rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                            @error('fullName')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                    <div class="space-y-2">
                        <label for="businessEmail" class="block text-gray-700">Business Email</label>
                        <input id="businessEmail" name="businessEmail" type="email"
                            class="w-full h-12 bg-white px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                            @error('businessEmail')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input id="password" name="password" type="password"
                            class="w-full h-12 bg-white px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500" />
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>
                </div>

                <div class="md:col-span-2 space-y-6 mt-4 text-center">
                   
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full md:w-auto px-8 py-4 bg-black text-white rounded-md hover:bg-gray-800 transition-colors">
                            Create My Account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
