@extends('layouts.app')

@Section('main')

    <main>
        <div class="flex items-center justify-between w-[100%] bg-gray-100 p-20 rounded-2xl shadow-2xl">
            <div class="max-w-xl">
                <h1 class="text-6xl font-extrabold text-gray-900 leading-tight">
                    Secure the Digital Frontier <br> with Elite Hunters
                </h1>
                <p class="text-gray-600 mt-6 text-xl">
                    Join our global community of cyber hunters tracking down vulnerabilities and protecting the digital ecosystem.
                </p>
                <div class="mt-10 space-x-8">
                    <button class="bg-black text-white px-10 py-4 text-xl rounded-lg font-semibold shadow-lg hover:bg-gray-800 transition">
                        Join the Hunt
                    </button>
                    <button class="border-2 border-gray-800 px-10 py-4 text-xl rounded-lg font-semibold shadow-lg hover:bg-gray-800 hover:text-white transition">
                        Watch Demo
                    </button>
                </div>
            </div>
            <div class="relative w-96 h-96 flex items-center justify-center">
                <div class="absolute w-80 h-80 border-4 border-gray-300 rounded-full"></div>
                <div class="absolute w-64 h-64 border-4 border-gray-400 rounded-full"></div>
                <div class="absolute w-48 h-48 border-4 border-gray-600 rounded-full"></div>
            </div>
        </div>
    </main>

@endsection
