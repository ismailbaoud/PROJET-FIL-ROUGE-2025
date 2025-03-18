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

@endsection
