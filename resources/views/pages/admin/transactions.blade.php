@extends('layouts.app')


@Section('main')
    <div class="flex h-screen bg-gray-100">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            @include('partials.admin.header')
            <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-white via-white via-5% to-[#E8F5E9]">
                <div class="max-w-7xl mx-auto">
                    <div class="p-6 min-h-screen">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">Gestion des Transactions</h1>


                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="w-full border-collapse">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="p-3 text-left">ID</th>
                                        <th class="p-3 text-left">From</th>
                                        <th class="p-3 text-left">To</th>
                                        <th class="p-3 text-left">Report</th>
                                        <th class="p-3 text-left">Program</th>
                                        <th class="p-3 text-left">amount</th>
                                        <th class="p-3 text-left">method</th>
                                        <th class="p-3 text-left">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $transactions as $transaction )
                                        
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="p-3">{{ $transaction->id }}</td>
                                        <td class="p-3">{{$transaction->fromUser->userName }}</td>
                                        <td class="p-3">{{$transaction->toUser->userName }}</td>
                                        <td class="p-3">{{$transaction->report->title }}</td>
                                        <td class="p-3">{{$transaction->program->title }}</td>
                                        <td class="p-3">$ {{ $transaction->amount }}</td>
                                        <td class="p-3">{{ $transaction->method }}</td>
                                        <td class="p-3">{{ $transaction->created_at }}</td>
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
