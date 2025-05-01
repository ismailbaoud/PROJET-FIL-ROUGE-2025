@extends('layouts.app')

@Section('main')
<div class="flex h-screen bg-gray-100">
    @include('partials.entreprise.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.entreprise.header')

        <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
            <div class="max-w-7xl mx-auto">
                <div class="p-6 min-h-screen">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Gestion des Transactions</h1>

                    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
                        <table class="min-w-full text-sm text-gray-700">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-center">
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-user mr-1"></i> From
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-user mr-1"></i> To
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-bug mr-1"></i> Report
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-flag mr-1"></i> Program
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-dollar-sign mr-1"></i> Amount
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-credit-card mr-1"></i> Method
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-calendar-alt mr-1"></i> Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($transactions as $transaction)
                                <tr class="hover:bg-green-50 transition-all text-center">
                                    <td class="py-4 px-6 font-medium">{{ $transaction->id }}</td>
                                    <td class="py-4 px-6">{{ $transaction->fromUser->userName }}</td>
                                    <td class="py-4 px-6">{{ $transaction->toUser->userName }}</td>
                                    <td class="py-4 px-6">{{ $transaction->report->title }}</td>
                                    <td class="py-4 px-6">{{ $transaction->program->title }}</td>
                                    <td class="py-4 px-6 text-green-600 font-bold">$ {{ $transaction->amount }}</td>
                                    <td class="py-4 px-6">{{ ucfirst($transaction->method) }}</td>
                                    <td class="py-4 px-6">{{ $transaction->created_at->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>
@endsection
