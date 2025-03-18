@extends('layouts.app')

@section('main')
<div class="flex flex-col md:flex-row items-center justify-between w-full bg-gradient-to-br from-white via-white via-30% to-[#E8F5E9] p-20">
  <div class="max-w-2xl">
      <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-2">Secure Your Business</h1>
      <h2 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-8">with Ethical Hackers</h2>
      
      <p class="text-lg md:text-xl text-gray-600 mb-10">Join HackerSquad & Leverage Our Cybersecurity Team!</p>
      
      <div class="flex items-center space-x-4">
          <button class="bg-black text-white px-8 py-3 rounded-lg font-medium text-lg">Get Started</button>
          <p class="text-lg text-gray-600">Already have an account? <a href="#" class="text-gray-900 underline">Sign in</a></p>
      </div>
  </div>
  <div class="w-[40%] md:w-[30%] flex justify-center">
      <img src="{{ asset('images/SignUp.svg') }}" alt="Sign Up">
  </div>
</div>
<div class="bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
<div class="w-full max-w-6xl mx-auto px-4 py-8 ">
  <form class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-6">
    <!-- Step 1: Company Details -->
    <div class="space-y-6">
      <h2 class="text-xl font-medium text-gray-700">Step 1: Company Details</h2>
      
      <div class="space-y-2">
        <label for="companyName" class="block text-gray-700">Company Name</label>
        <input 
          id="companyName"
          name="companyName"
          type="text"
          class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
        />
      </div>
      
      <div class="space-y-2">
        <label for="accountUrl" class="block text-gray-700">Account URL</label>
        <input
          id="accountUrl"
          name="accountUrl"
          type="text"
          class=" bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
        />
      </div>
      
      <div class="grid grid-cols-2 gap-4">
        <div class="space-y-2">
          <label for="country" class="block text-gray-700">Country</label>
          <input
            id="country"
            name="country"
            type="text"
            class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
          />
        </div>
        <div class="space-y-2">
          <label for="state" class="block text-gray-700">State</label>
          <input
            id="state"
            name="state"
            type="text"
            class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
          />
        </div>
      </div>
    </div>
    
    <!-- Step 2: Security Contact Information -->
    <div class="space-y-6">
      <h2 class="text-xl font-medium text-gray-700">Step 2: Security Contact Information</h2>
      
      <div class="space-y-2">
        <label for="fullName" class="block text-gray-700">Full Name</label>
        <input
          id="fullName"
          name="fullName"
          type="text"
          class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
        />
      </div>
      
      <div class="space-y-2">
        <label for="businessEmail" class="block text-gray-700">Business Email</label>
        <input
          id="businessEmail"
          name="businessEmail"
          type="email"
          class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
        />
      </div>
      
      <div class="space-y-2">
        <label for="password" class="block text-gray-700">Password</label>
        <input
          id="password"
          name="password"
          type="password"
          class="bg-white w-full h-12 px-3 rounded-md border border-black focus:outline-none focus:ring-1 focus:ring-gray-500"
        />
      </div>
    </div>
    
    <!-- Terms and Submit Button - Full Width -->
    <div class="md:col-span-2 space-y-6 mt-4">
      <div class="flex items-center space-x-2">
        <input
          type="checkbox"
          id="terms"
          class="bg-white h-4 w-4 rounded border-gray-300 text-black focus:ring-0"
        />
        <label for="terms" class="text-sm font-medium text-gray-700">
          I agree to the Terms & Conditions
        </label>
      </div>
      
      <div class="flex justify-center">
        <button
          type="submit"
          class="w-full md:w-auto md:px-64 py-4 bg-black text-white rounded-md hover:bg-gray-800 transition-colors"
        >
          Create My Account
        </button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
