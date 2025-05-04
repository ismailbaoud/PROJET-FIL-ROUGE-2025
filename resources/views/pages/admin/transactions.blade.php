@extends('layouts.app')

@section('main')
<div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
    @include('partials.admin.sidebar')
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.admin.header')
        <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="max-w-7xl mx-auto">
                <div class="p-6 min-h-screen">
                    <h1 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                        <i class="fas fa-exchange-alt text-blue-400"></i>
                        Transaction Management
                    </h1>

                    <div class="bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-600">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="p-3 text-left text-gray-200">ID</th>
                                    <th class="p-3 text-left text-gray-200">From</th>
                                    <th class="p-3 text-left text-gray-200">To</th>
                                    <th class="p-3 text-left text-gray-200">Report</th>
                                    <th class="p-3 text-left text-gray-200">Program</th>
                                    <th class="p-3 text-left text-gray-200">Amount</th>
                                    <th class="p-3 text-left text-gray-200">Method</th>
                                    <th class="p-3 text-left text-gray-200">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr class="border-b border-gray-600 hover:bg-gray-700/50 transition-all duration-300">
                                        <td class="p-3 text-white">{{ $transaction->id }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->fromUser->userName }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->toUser->userName }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->report->title }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->program->title }}</td>
                                        <td class="p-3 text-blue-400">$ {{ $transaction->amount }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->method }}</td>
                                        <td class="p-3 text-gray-200">{{ $transaction->created_at }}</td>
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