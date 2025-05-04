@extends('layouts.app')

@section('main')
<div class="">
    <div class="flex flex-col md:flex-row items-center justify-between w-[100%] bg-gradient-to-br from-white via-white via-30% to-[#E8F5E9] p-10 md:p-20">
        <div class="max-w-xxl text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                Secure the Digital Frontier <br> with Elite Hunters
            </h1>
            <p class="text-gray-600 mt-6 text-xl max-w-xl mx-auto md:mx-0">
                Join our global community of cyber hunters tracking down vulnerabilities and protecting the digital ecosystem.
            </p>
            {{-- <div class="mt-10 space-x-0 md:space-x-8 flex flex-col md:flex-row justify-center md:justify-start">
                <button class="bg-black text-white px-8 py-4 text-lg md:text-xl rounded-lg font-semibold hover:bg-gray-800 transition duration-300 w-full md:w-auto mb-4 md:mb-0">
                    Join the Hunt
                </button>
            </div> --}}
        </div>
        <div class="relative w-full md:w-[1000px] h-full flex items-center justify-center mt-8 md:mt-0">
            <img src="{{ asset('images/bug.svg') }}" alt="">
        </div>
    </div>

    <div id="about" class="bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9] pb-20">
        <h2 class="text-4xl font-extrabold p-6 md:p-30 text-gray-900 flex items-center space-x-3">
            <span class="w-full text-center"><i class="fa-solid fa-rocket"></i> How It Works</span>
        </h2>

        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-10 w-full">
            <div class="w-full md:w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 transition-all duration-300 text-center mb-8 md:mb-0">
                <div class="text-5xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-400">
                    <i class="fa-solid fa-user-secret"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Sign Up
                </h3>
                <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                    Create your account and complete your ethical hacker profile.
                </p>
                <button class="mt-6 px-6 py-3 bg-black text-white font-semibold rounded-lg hover:from-blue-500 hover:to-teal-500 transition-all duration-300">
                    Get Started
                </button>
            </div>

            <div class="w-full md:w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 transition-all duration-300 ease-in-out text-center mb-8 md:mb-0">
                <div class="text-6xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-400">
                    <i class="fa-solid fa-bug"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Analyze Vulnerabilities
                </h3>
                <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                    Explore our programs to identify critical vulnerabilities.
                </p>
                <button class="mt-6 px-6 py-3 bg-black text-white font-semibold rounded-lg hover:from-green-500 hover:to-teal-500 transition-all duration-300">
                    Get Started
                </button>
            </div>

            <div class="w-full md:w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 transition-all duration-300 ease-in-out text-center mb-8 md:mb-0">
                <div class="text-6xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Earn Rewards
                </h3>
                <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                    Receive bounties for each validated vulnerability.
                </p>
                <button class="mt-6 px-6 py-3 bg-black text-white font-semibold rounded-lg hover:from-purple-500 hover:to-indigo-500 transition-all duration-300">
                    Get Started
                </button>
            </div>
        </div>
    </div>

    <div class="md:mt-20 bg-gradient-to-br from-white via-white via-50% to-[#E8F5E9]">
        <h2 class="text-4xl text-center p-10 md:p-20 font-extrabold text-gray-900 mb-5">Cyberwarriors' Hall of Fame</h2>
        <p class="text-gray-600 text-lg mb-10 text-center">Where legends are forged in the digital battleground</p>

        <div class="flex flex-wrap justify-center gap-8 w-full">
            <div class="w-full sm:w-1/2 lg:w-[30%] bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center relative">
                <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">2</div>
                <div class="w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                <h3 class="text-xl font-bold text-gray-700">ZeroDay</h3>
                <p class="text-gray-500">Stealth Master</p>
                <p class="text-3xl font-bold text-gray-700 mt-2">89,450</p>
            </div>

            <div class="w-full sm:w-1/2 lg:w-[30%] bg-gray-50 p-8 rounded-2xl border border-gray-200 text-center relative">
                <div class="absolute top-3 right-4 text-2xl font-bold text-gray-600">1</div>
                <div class="w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                <h3 class="text-xl font-bold text-gray-700">HappyHunter</h3>
                <p class="text-gray-500">Stealth Master</p>
                <p class="text-3xl font-bold text-gray-700 mt-2">125,780</p>
            </div>

            <div class="w-full sm:w-1/2 lg:w-[30%] bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center relative">
                <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">3</div>
                <div class="w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                <h3 class="text-xl font-bold text-gray-700">MrRobot</h3>
                <p class="text-gray-500">Expert BlackHat</p>
                <p class="text-3xl font-bold text-gray-700 mt-2">76,320</p>
            </div>
        </div>
    </div>

    <div id="reports" class="px-6 md:px-20 pb-10 md:pb-20 pt-10 bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
        <div class="p-6 md:p-20">
            <h1 class="text-3xl font-bold text-center mb-5">Bug Bounty Reports</h1>
            <p class="text-gray-500 text-center mb-5">View and manage vulnerability reports</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-44">
            <div class="flex justify-center items-center">
                <div class="bg-white p-6 rounded-xl border border-gray-200 w-full max-w-md">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-semibold text-sm bg-gray-100 px-3 py-1 rounded-full">High</span>
                        <span class="px-3 py-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-full text-xs">In Progress</span>
                    </div>
                    <h2 class="text-xl font-semibold mt-4 text-gray-800">Authentication Bypass via OAuth</h2>
                    <p class="text-gray-500 text-sm">Reported by <span class="font-medium text-gray-700">ethical_hacker</span> • 1 week ago</p>
                    <div class="mt-4 flex items-center gap-3">
                        <img src="https://i.pravatar.cc/40" alt="Hunter Avatar" class="w-10 h-10 rounded-full border border-gray-300">
                        <div>
                            <p class="text-gray-800 font-semibold">ethical_hacker</p>
                            <p class="text-gray-500 text-sm">Level 3 Hunter</p>
                        </div>
                    </div>
                    <div class="mt-5">
                        <p class="text-gray-700 font-semibold">Vulnerability Type</p>
                        <p class="text-gray-600">Authentication Bypass (CWE-287)</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-700 font-semibold">Severity</p>
                        <div class="w-full bg-gray-200 rounded-full h-2 relative">
                            <div class="bg-gray-500 h-2 rounded-full" style="width: 75%;"></div>
                        </div>
                        <p class="text-gray-600 text-sm mt-1">7.5 / 10</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-700 font-semibold">Impact</p>
                        <p class="text-gray-600">Account takeover via OAuth manipulation</p>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <p class="text-gray-600 font-semibold text-sm">Pending</p>
                        <button class="bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-gray-700 transition">
                            View Report
                        </button>
                    </div>
                    <p class="text-gray-400 text-xs mt-4">Updated 5 days ago</p>
                </div>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/Cyber attack-bro.svg') }}" alt="" class="w-full max-w-xs md:max-w-md">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-8 text-center w-full bg-gradient-to-tr from-white via-white via-90% to-[#E8F5E9]">
        <div class="flex justify-center items-center mb-4">
            <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">✓</div>
        </div>
        <h2 class="text-xl md:text-2xl font-semibold text-gray-700 mb-10 md:mb-20">Protecting the world's top innovators</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 mt-6">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Salesforce.com_logo.svg" alt="Salesforce" class="h-8 md:h-10 mx-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/58/Uber_logo_2018.svg" alt="Uber" class="h-8 md:h-10 mx-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Zoom_Communications_Logo.svg" alt="Zoom" class="h-8 md:h-10 mx-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/bd/2024_Spotify_Logo.svg" alt="Spotify" class="h-8 md:h-10 mx-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-8 md:h-10 mx-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Adobe_logo_and_wordmark_%282017%29.svg" alt="Adobe" class="h-8 md:h-10 mx-auto">
        </div>
    </div>
</div>
@endsection