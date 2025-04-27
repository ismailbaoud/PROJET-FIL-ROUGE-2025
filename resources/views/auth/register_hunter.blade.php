@extends('layouts.app')

@Section('main')
    <div class="flex justify-center items-center min-h-screen px-4 sm:px-6 lg:px-8 bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
        <div class="w-full md:w-1/3 flex justify-center">
            <img src="{{ asset('images/login.svg') }}" alt="Sign Up" class="max-w-full h-auto">
        </div>
        <div class="w-full max-w-lg space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-2xl font-bold text-gray-900">Create Your Hunter Account</h2>
            </div>
            <div class="mt-8 space-y-6">
                <div class="flex flex-col sm:flex-row w-full">
                    <a href="{{ route('auth.github') }}"
"
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded bg-gray-900 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Sign up with GitHub
                </a>
                </div>

                <form action="{{ route('hunterRegister') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="username" name="userName"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('userName')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password"
                                class="block  mt-4 text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            </div>
                        <div>
                            <label for="confirm-password" class="block mt-4 text-sm font-medium text-gray-700 mb-1">Confirm
                                Password</label>
                            <input type="password" id="confirm-password" name="password_confirmation"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="passwocountryrd"
                                class="block  mt-4 text-sm font-medium text-gray-700 mb-1">country</label>
                            <input type="text" id="country" name="country"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('country')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                        <div>
                            <label for="state" class="block mt-4 text-sm font-medium text-gray-700 mb-1">state</label>
                            <input type="text" id="state" name="state"
                                class="w-full px-3 py-3 border border-gray-300 bg-gray-50 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @error('state')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif
@endsection
