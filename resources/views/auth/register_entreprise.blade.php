@extends('layouts.app')

@Section('main')
<div class="flex items-center justify-between w-full bg-gradient-to-br from-white via-white via-30% to-[#E8F5E9] p-20">
    <div class="max-w-xxl">
        <div class="max-w-md">
            <h1 class="text-6xl font-extrabold text-gray-900 mb-2">Secure Your Business</h1>
            <h2 class="text-6xl font-extrabold text-gray-900 mb-8">with Ethical Hackers</h2>
            
            <p class="text-xl text-gray-600 mb-12">Join HackerSquad & Leverage Our Cybersecurity Team!</p>
            
            <div class="flex items-center space-x-4 mt-6">
                <button class="bg-black text-white px-10 rounded-lg py-4 rounded font-medium text-xl">Get Started</button>
                <p class="text-xl text-gray-600">Already have an account? <a href="#" class="text-gray-900 underline">Sign in</a></p>
            </div>
        </div>
    </div>
    <div class="relative w-[30%] h-full flex items-center justify-center ">
        <img src="{{ asset('images/SignUp.svg') }}" alt="">
    </div>
</div>
<div class="h-screen flex items-center max-w-[50%] justify-between py-12 px-4 bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
    <div class="relative w-[30%] h-full flex items-center justify-center ">
        <img src="{{ asset('images/12445723_4944409.svg') }}" alt="">
    </div>
    <div class=" w-full bg-white rounded-lg shadow-lg p-8">
       <div class="w-1/2">
        <div class="mb-8 w-1/2 ">
            <h2 class="text-lg font-medium text-gray-900 mb-6">Step 1: Company Details</h2>
            
            <div class="mb-6">
                <label for="company-name" class="block text-sm font-normal text-gray-700 mb-1">Company Name</label>
                <input type="text" id="company-name" name="company-name" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
            </div>
            
            <div class="mb-6">
                <label for="account-url" class="block text-sm font-normal text-gray-700 mb-1">Account URL</label>
                <input type="text" id="account-url" name="account-url" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
            </div>
            
            <div class="flex space-x-4 mb-6">
                <div class="w-1/2">
                    <label for="country" class="block text-sm font-normal text-gray-700 mb-1">Country</label>
                    <input type="text" id="country" name="country" 
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
                </div>
                <div class="w-1/2">
                    <label for="state" class="block text-sm font-normal text-gray-700 mb-1">State</label>
                    <input type="text" id="state" name="state" 
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
                </div>
            </div>
        </div>
        
        <div class="mb-8">
            <h2 class="text-lg font-medium text-gray-900 mb-6">Step 2: Security Contact Information</h2>
            
            <div class="mb-6">
                <label for="full-name" class="block text-sm font-normal text-gray-700 mb-1">Full Name</label>
                <input type="text" id="full-name" name="full-name" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
            </div>
            
            <div class="mb-6">
                <label for="business-email" class="block text-sm font-normal text-gray-700 mb-1">Business Email</label>
                <input type="email" id="business-email" name="business-email" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-normal text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
            </div>
        </div>
        
        <div class="mb-8 flex items-start">
            <div class="flex items-center h-5">
                <input type="checkbox" id="terms" name="terms" 
                       class="focus:ring-2 focus:ring-gray-200 h-4 w-4 text-black border-gray-300 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="terms" class="font-normal text-gray-700">I agree to the Terms & Conditions</label>
            </div>
        </div>
        
        <button type="submit" 
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Create My Account
        </button>
       </div>
    </div>

</div>
<div class=" flex items-center justify-center min-h-screen ">

    <div class="w-[90%] mx-auto text-center p-6">
        <h2 class="text-2xl font-bold text-black mb-10">Why Choose HappyHunt?</h2>
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div class="text-left">
                    <h3 class="font-semibold text-black">Access to Top Ethical Hackers</h3>
                    <p class="text-gray-600 text-sm">Work with the best security researchers</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div class="text-left">
                    <h3 class="font-semibold text-black">Flexible & Customizable Programs</h3>
                    <p class="text-gray-600 text-sm">Design your ideal bounty program</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div class="text-left">
                    <h3 class="font-semibold text-black">Seamless Vulnerability Reporting</h3>
                    <p class="text-gray-600 text-sm">Manage workflow for incoming reports</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
