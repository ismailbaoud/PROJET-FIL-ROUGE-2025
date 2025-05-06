@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-white">
    @includeWhen(Auth::user()->role === 'entreprise', 'partials.entreprise.sidebar')
    @includeWhen(Auth::user()->role === 'hunter', 'partials.hunter.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @includeWhen(Auth::user()->role === 'entreprise', 'partials.entreprise.header')
        @includeWhen(Auth::user()->role === 'hunter', 'partials.hunter.header')

        <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="max-w-2xl mx-auto">
                <div class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6 mb-6 flex items-center gap-4">
                    <img src="{{ asset('storage/' . $profile->content_vusial) }}"
                         class="h-20 w-20 rounded-full object-cover border border-gray-600" alt="Profile Avatar">

                    @if (Auth::id() === $user->id && Auth::user()->role === 'hunter')
                        <form action="{{ route('hunter_upload_avatar') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                            @csrf
                            <input type="file" id="content_visual" name="content_vusial" accept="image/*"
                                   class="text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-600 file:text-white hover:file:bg-red-700">
                            @error('content_vusial')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                            <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50"
                                    @if ($errors->has('content_vusial')) disabled @endif>
                                Upload Image
                            </button>
                        </form>
                    @else
                        <p class="text-sm text-gray-300">Profile Image</p>
                    @endif
                </div>

                <div id="profileSettings" class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6 mb-8">
                    <h2 class="text-xl font-semibold text-white mb-4">Profile Settings</h2>

                    @if (Auth::id() === $user->id && Auth::user()->role === 'hunter')
                        <form action="{{ route('hunter_settings_update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="space-y-4">
                                <div>
                                    <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                                    <input type="text" id="username" name="username"
                                           value="{{ old('userName', $user->username) }}"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                           required>
                                    @error('username')
                                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                                    <p type="email" id="email" value="" readonly
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-600 text-gray-300 cursor-not-allowed">{{ $user->email }}</p>
                                </div>

                                <div>
                                    <label for="points" class="block text-sm font-medium text-gray-300">Points</label>
                                    <p id="points" value="" readonly
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-600 text-gray-300 cursor-not-allowed">{{ $profile->pointes ?? 0 }}</p>
                                </div>

                                <div>
                                    <label for="rewards" class="block text-sm font-medium text-gray-300">Rewards</label>
                                    <p type="text" id="rewards" readonly
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-600 text-gray-300 cursor-not-allowed">{{ $profile->rewards ?? 'None' }}</p>
                                </div>

                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-300">Country</label>
                                    <input type="text" id="country" name="country"
                                           value="{{ old('country', $profile->country ?? '') }}"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('country')
                                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-300">State</label>
                                    <input type="text" id="state" name="state"
                                           value="{{ old('state', $profile->state ?? '') }}"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('state')
                                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit"
                                    class="mt-6 w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50"
                                    @if ($errors->any()) disabled @endif>
                                Save Profile
                            </button>
                        </form>
                    @else
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Username</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $user->username ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Email</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $user->email ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Points</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $profile->pointes ?? '0' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Rewards</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $profile->rewards ?? 'None' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">Country</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $profile->country ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300">State</label>
                                <p class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white">{{ $profile->state ?? 'N/A' }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                @if (Auth::id() === $user->id && Auth::user()->role === 'hunter')
                    <form action="{{ route('hunter_settings_payment') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div id="paymentDetails" class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6">
                            <h3 class="text-xl font-semibold text-white mb-4">Payment Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="payment_name" class="block text-sm font-medium text-gray-300">Name</label>
                                    <input id="payment_name" name="name"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                           value="{{ $paymentInfo->name ?? 'N/A' }}" />
                                </div>
                                <div>
                                    <label for="payment_address" class="block text-sm font-medium text-gray-300">Address</label>
                                    <input id="payment_address" name="address"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                           value="{{ $paymentInfo->address ?? 'N/A' }}" />
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-300">Postal Code</label>
                                    <input id="postal_code" name="postal_code"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                           value="{{ $paymentInfo->postal_code ?? 'N/A' }}" />
                                </div>
                                <div>
                                    <label for="rib" class="block text-sm font-medium text-gray-300">RIB</label>
                                    <input id="rib" name="rib"
                                           class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                           value="{{ $paymentInfo->rib ?? 'N/A' }}" />
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                                class="mt-6 w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50"
                                @if ($errors->any()) disabled @endif>
                            Save Changes
                        </button>
                    </form>
                @endif
                
            </div>
        </main>
    </div>
</div>
@endsection