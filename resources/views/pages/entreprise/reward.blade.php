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
                <div class="max-w-3xl mx-auto shadow rounded-xl p-6 border border-gray-200">
                    <h1 class="text-xl font-bold text-gray-900 mb-4">Give Reward for Report: {{ $report->title }}</h1>

                    <form method="POST" action="
                    {{ route('entreprise_reward_submit', $report->user) }}
                        " id="rewardForm">
                        @csrf
                        <div class="mb-4">
                            <label for="reward_type" class="block text-sm font-medium text-gray-700 mb-1">Reward Type</label>
                            <select name="reward_type" id="reward_type"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                                <option value="pointes">Give Pointes</option>
                                <option value="bounty">Pay Bounty</option>
                            </select>
                        </div>

                        <div id="pointes_section" class="mb-4">
                            <label for="pointe_amount" class="block text-sm font-medium text-gray-700 mb-1">Pointes (1-100)</label>
                            <input type="number" name="pointe_amount" id="pointe_amount" min="1" max="100"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                        </div>

                        <div id="bounty_section" class="mb-4 hidden">
                            <h2 class="text-md font-semibold text-gray-800 mb-2">User Payment Details</h2>
                            <ul class="text-sm text-gray-700 mb-4">
                                <li><strong>Name:</strong> {{ $report->user->userName }}</li>
                                <li><strong>Email:</strong> {{ $report->user->email }}</li>
                                <li><strong>Rib:</strong> {{ $report->user->profile->rib ?? 'not found' }} </li>
                            </ul>

                            <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                            <select name="payment_method" id="payment_method"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                                <option value="stripe">Stripe (Simulated)</option>
                            </select>

                            <div class="mb-4">
                                <label for="bounty_amount" class="block text-sm font-medium text-gray-700 mb-1">Bounty Amount</label>
                                <input type="number" name="bounty_amount" id="bounty_amount"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-medium text-sm px-4 py-2 rounded-lg shadow">
                                Submit Reward
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        const rewardType = document.getElementById('reward_type');
        const pointesSection = document.getElementById('pointes_section');
        const bountySection = document.getElementById('bounty_section');

        rewardType.addEventListener('change', function () {
            if (this.value === 'pointes') {
                pointesSection.classList.remove('hidden');
                bountySection.classList.add('hidden');
            } else {
                pointesSection.classList.add('hidden');
                bountySection.classList.remove('hidden');
            }
        });
    </script>
@endsection
