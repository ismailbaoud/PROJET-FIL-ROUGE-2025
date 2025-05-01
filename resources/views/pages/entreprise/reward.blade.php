@extends('layouts.app')

@section('main')
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @if(auth()->user()->role === 'entreprise')
        @include('partials.entreprise.sidebar')
    @else
        @include('partials.hunter.sidebar')
    @endif

    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Header --}}
        @if(auth()->user()->role === 'entreprise')
            @include('partials.entreprise.header')
        @else
            @include('partials.hunter.header')
        @endif

        <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
            <div class="max-w-3xl mx-auto shadow rounded-xl p-8 border border-gray-200 bg-white">
                <h1 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <i class="fas fa-gift text-green-600"></i> 
                    Reward for Report: {{ $report->title }}
                </h1>

                <form method="POST" action="{{ route('entreprise_reward_submit', $report) }}" id="rewardForm">
                    @csrf

                    {{-- Reward Type --}}
                    <div class="mb-6">
                        <label for="reward_type" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-tags text-gray-500"></i> Reward Type
                        </label>
                        <select name="reward_type" id="reward_type"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2">
                            <option value="pointes">Give Pointes</option>
                            <option value="bounty">Pay Bounty</option>
                        </select>
                    </div>

                    {{-- Pointes Section --}}
                    <div id="pointes_section" class="mb-6">
                        <label for="pointe_amount" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-coins text-yellow-500"></i> Pointes Amount (1-100)
                        </label>
                        <input type="number" name="pointe_amount" id="pointe_amount" min="1" max="100"
                            placeholder="Enter points between 1 and 100"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2">
                    </div>

                    {{-- Bounty Section --}}
                    <div id="bounty_section" class="mb-6 hidden">
                        <h2 class="text-md font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-money-check-alt text-blue-500"></i> User Payment Details
                        </h2>

                        <ul class="text-sm text-gray-700 mb-6 space-y-2">
                            <li><i class="fas fa-user text-gray-400"></i> <strong>Name:</strong> {{ $report->user->userName }}</li>
                            <li><i class="fas fa-envelope text-gray-400"></i> <strong>Email:</strong> {{ $report->user->email }}</li>
                            <li><i class="fas fa-bank text-gray-400"></i> <strong>RIB:</strong> {{ $report->user->profile->rib ?? 'Not Found' }}</li>
                        </ul>

                        {{-- Payment Method --}}
                        <div class="mb-6">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-credit-card text-indigo-500"></i> Payment Method
                            </label>
                            <select name="payment_method" id="payment_method"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2">
                                <option value="stripe">Stripe (Simulated)</option>
                            </select>
                        </div>

                        {{-- Bounty Amount --}}
                        <div class="mb-6">
                            <label for="bounty_amount" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-dollar-sign text-green-500"></i> Bounty Amount
                            </label>
                            <input type="number" name="bounty_amount" id="bounty_amount"
                                placeholder="Enter bounty amount"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2">
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold text-sm px-6 py-3 rounded-lg shadow flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i> Submit Reward
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

{{-- Custom Script --}}
<script src="{{ asset('js/entreprises/rewards.js') }}" defer></script>
@endsection
