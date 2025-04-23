@extends('layouts.app')

@section('main')
    <div class="flex min-h-screen bg-lightGray">
        @include('partials.hunter.sidebar')
        <div class="flex-1 flex flex-col">
            @include('partials.hunter.header')
            <main class="w-full max-w-5xl mx-auto p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-semibold text-darkGray">Messages</h1>
                    <a href="#" class="bg-green text-white px-4 py-2 rounded-md hover:bg-green-600 transition text-sm">
                        ➕ New Message
                    </a>
                </div>
                <div class="bg-white shadow-md rounded-xl overflow-hidden">
                    <div class="overflow-y-auto max-h-[500px] divide-y divide-gray-200">
                        @foreach ([['name' => 'Alice Smith', 'time' => '2 hours ago', 'message' => "Hey! I found a vulnerability in your program. Let's discuss it..."], ['name' => 'Bob Johnson', 'time' => '1 day ago', 'message' => 'Could you clarify the bounty amount for this program?'], ['name' => 'Charlie Lee', 'time' => '3 days ago', 'message' => 'Is the red team challenge still open?']] as $msg)
                            <div class="p-4 hover:bg-gray-50 cursor-pointer transition">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold text-darkGray">{{ $msg['name'] }}</span>
                                    <span class="text-sm text-gray-500">{{ $msg['time'] }}</span>
                                </div>
                                <p class="text-gray-700 mt-2 text-sm">{{ $msg['message'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
