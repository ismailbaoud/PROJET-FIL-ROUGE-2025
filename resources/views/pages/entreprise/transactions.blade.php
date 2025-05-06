@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
    @include('partials.entreprise.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.entreprise.header')
        <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="W-[100%] mx-auto">
                <div class="p-6 min-h-screen">
                    <h1 class="text-3xl font-bold text-white mb-8 flex items-center gap-2">
                        <i class="fas fa-exchange-alt text-blue-400"></i> Transaction Management
                    </h1>

                    <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-2xl border border-gray-600">
                        <table class="min-w-full text-sm text-gray-200">
                            <thead>
                                <tr class="bg-gray-700 text-gray-200 text-center">
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">ID</th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-user mr-1 text-blue-400"></i> From
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-user mr-1 text-blue-400"></i> To
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-bug mr-1 text-blue-400"></i> Report
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-flag mr-1 text-blue-400"></i> Program
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-dollar-sign mr-1 text-blue-400"></i> Amount
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-credit-card mr-1 text-blue-400"></i> Method
                                    </th>
                                    <th class="py-4 px-6 font-semibold uppercase tracking-wider">
                                        <i class="fas fa-calendar-alt mr-1 text-blue-400"></i> Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-600">
                                @foreach ($transactions as $transaction)
                                    <tr class="hover:bg-gray-700/50 transition-all duration-300 text-center">
                                        <td class="py-4 px-6 font-medium text-white">{{ $transaction->id }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ $transaction->fromUser->username }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ $transaction->toUser->username }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ $transaction->report->title }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ $transaction->program->title }}</td>
                                        <td class="py-4 px-6 text-blue-400 font-bold">$ {{ $transaction->amount }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ ucfirst($transaction->method) }}</td>
                                        <td class="py-4 px-6 text-gray-200">{{ $transaction->created_at->format('d M Y') }}</td>
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