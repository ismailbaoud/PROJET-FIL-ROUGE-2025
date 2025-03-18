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
<!-- Container to hold both steps side by side on larger screens -->
<div class="flex  flex-col md:flex-row gap-8 w-1/2 pt-0 justify-center items-center bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">

  <!-- Step 1: Company Details -->
  <div class="w-1/2">
    <h2 class="text-xl font-bold mb-6  text-center">Step 1: Company Details</h2>
    
    <!-- Company Name -->
    <div class="mb-4">
      <label class="block mb-2 text-sm font-medium  text-center">Company Name</label>
      <input 
        type="text" 
        class="w-full p-5 border border-gray-300  rounded-md bg-white "
      />
    </div>
  
    <!-- Account URL -->
    <div class="mb-4">
      <label class="block mb-2 text-sm font-medium  text-center">Account URL</label>
      <input 
        type="text" 
        class="w-full p-3 border border-gray-300  rounded-md bg-white "
      />
    </div>
  
    <!-- Country / State in two columns -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block mb-2 text-sm font-medium  text-center">Country</label>
        <input 
          type="text" 
          class="w-full p-5 border border-gray-300  rounded-md bg-white "
        />
      </div>
      <div>
        <label class="block mb-2 text-sm font-medium  text-center">State</label>
        <input 
          type="text" 
          class="w-full p-3 border border-gray-300  rounded-md bg-white "
        />
      </div>
    </div>
  </div>
  
  <!-- Step 2: Security Contact Information -->
  <div class="w-1/2">
    <h2 class="text-xl font-bold mb-6  text-center">Step 2: Security Contact Information</h2>
    
    <!-- Full Name -->
    <div class="mb-4">
      <label class="block mb-2 text-sm font-medium  text-center">Full Name</label>
      <input 
        type="text" 
        class="w-full p-3 border border-gray-300  rounded-md bg-white "
      />
    </div>
  
    <!-- Business Email -->
    <div class="mb-4">
      <label class="block mb-2 text-sm font-medium  text-center">Business Email</label>
      <input 
        type="email" 
        class="w-full p-3 border border-gray-300  rounded-md bg-white "
      />
    </div>
  
    <!-- Password -->
    <div>
      <label class="block mb-2 text-sm font-medium  text-center">Password</label>
      <input 
        type="password" 
        class="w-full p-3 border border-gray-300  rounded-md bg-white "
      />
    </div>
  </div>
  
  </div>
  
  <!-- Terms & Conditions Checkbox -->
  <div class="flex  justify-center utems-center items-center mt-6 text-center">
  <input type="checkbox" class="mr-2" />
  <label class="text-sm  text-center ">I agree to the Terms & Conditions</label>
  </div>
  
  <!-- Create Account Button -->
  <div class="flex justify-center mt-6">
  <button class="bg-black text-white font-medium p-10 rounded-md">
    Create My Account
  </button>
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
