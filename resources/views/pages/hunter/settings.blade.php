@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        @includeWhen(Auth::user()->role === 'entreprise', 'partials.entreprise.sidebar')
        @includeWhen(Auth::user()->role === 'hunter', 'partials.hunter.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            @includeWhen(Auth::user()->role === 'entreprise', 'partials.entreprise.header')
            @includeWhen(Auth::user()->role === 'hunter', 'partials.hunter.header')

            <main class="flex-1 overflow-auto p-6">
                <div class="max-w-2xl mx-auto">
                    <!-- Profile Avatar -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6 flex items-center gap-4">
                        <img src="{{asset('storage/'.$profile->content_vusial)}}"
                             class="h-20 w-20 rounded-full object-cover border" alt="Profile Avatar">
                        @if (Auth::id() === $user->id)
                            <form action="{{ route('hunter_upload_avatar') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                                @csrf
                                <div>
                                    <label for="content_visual" class="sr-only">Profile Image</label>
                                    <input type="file" id="content_visual" name="content_visual" accept="image/*" class="text-sm text-gray-600">
                                    @error('content_visual')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50"
                                        @if ($errors->has('content_visual')) disabled @endif>
                                    Upload Image
                                </button>
                            </form>
                        @else
                            <p class="text-sm text-gray-600">Profile Image</p>
                        @endif
                    </div>

                    <!-- Profile Settings -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Profile Settings</h2>
                        @if (Auth::id() === $user->id)
                            <form action="{{ route('hunter_settings_update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="space-y-4">
                                    <!-- Username -->
                                    <div>
                                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                        <input type="text" id="username" name="userName" value="{{ old('userName', $user->userName) }}"
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                               required>
                                        @error('userName')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email (Read-only) -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" id="email" value="{{ $user->email }}" readonly
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100 cursor-not-allowed">
                                    </div>

                                    <!-- Points (Read-only) -->
                                    <div>
                                        <label for="points" class="block text-sm font-medium text-gray-700">Points</label>
                                        <input type="text" id="points" value="{{ $profile->points ?? 0 }}" readonly
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100 cursor-not-allowed">
                                    </div>

                                    <!-- Rewards (Read-only) -->
                                    <div>
                                        <label for="rewards" class="block text-sm font-medium text-gray-700">Rewards</label>
                                        <input type="text" id="rewards" value="{{ $profile->rewards ?? 'None' }}" readonly
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100 cursor-not-allowed">
                                    </div>

                                    <!-- Country -->
                                    <div>
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                        <input type="text" id="country" name="country" value="{{ old('country', $profile->country ?? '') }}"
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                        @error('country')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- State -->
                                    <div>
                                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                        <input type="text" id="state" name="state" value="{{ old('state', $profile->state ?? '') }}"
                                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                        @error('state')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
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
                                <!-- Username -->
                                <div>
                                    <label for="username_static" class="block text-sm font-medium text-gray-700">Username</label>
                                    <p id="username_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $user->userName ?? 'N/A' }}</p>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email_static" class="block text-sm font-medium text-gray-700">Email</label>
                                    <p id="email_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $user->email ?? 'N/A' }}</p>
                                </div>

                                <!-- Points -->
                                <div>
                                    <label for="points_static" class="block text-sm font-medium text-gray-700">Points</label>
                                    <p id="points_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $profile->points ?? 0 }}</p>
                                </div>

                                <!-- Rewards -->
                                <div>
                                    <label for="rewards_static" class="block text-sm font-medium text-gray-700">Rewards</label>
                                    <p id="rewards_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $profile->rewards ?? 'None' }}</p>
                                </div>

                                <!-- Country -->
                                <div>
                                    <label for="country_static" class="block text-sm font-medium text-gray-700">Country</label>
                                    <p id="country_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $profile->country ?? 'N/A' }}</p>
                                </div>

                                <!-- State -->
                                <div>
                                    <label for="state_static" class="block text-sm font-medium text-gray-700">State</label>
                                    <p id="state_static" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $profile->state ?? 'N/A' }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Payment Info (Enterprise Only) -->
                    @if (Auth::user()->role === 'entreprise')
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Payment Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="payment_name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <p id="payment_name" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $paymentInfo->name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label for="payment_address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <p id="payment_address" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $paymentInfo->address ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <p id="postal_code" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $paymentInfo->postal_code ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label for="rib" class="block text-sm font-medium text-gray-700">RIB</label>
                                    <p id="rib" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100">{{ $paymentInfo->rib ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->id === $user->id)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Payment Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="payment_name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input id="payment_name" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100" value="{{ $paymentInfo->name ?? 'N/A' }}"/>
                                </div>
                                <div>
                                    <label for="payment_address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input id="payment_address" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100" value="{{ $paymentInfo->address ?? 'N/A' }}"/>
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <input id="postal_code" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100" value="{{ $paymentInfo->postal_code ?? 'N/A' }}"/>
                                </div>
                                <div>
                                    <label for="rib" class="block text-sm font-medium text-gray-700">RIB</label>
                                    <input id="rib" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 bg-gray-100" value="{{ $paymentInfo->rib ?? 'N/A' }}/">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
@endsection