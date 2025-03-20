@extends('layouts.app')


  @Section('main')

      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
          <!-- Payment Header -->
          <div class="flex justify-between items-center mb-8">
            <div>
              <h2 class="text-2xl font-semibold text-gray-900">Bounty Payments</h2>
              <p class="text-gray-500 mt-1">Process and manage bug bounty rewards for your programs</p>
            </div>
            <div class="flex space-x-3">
              <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50">
                Payment History
              </button>
              <button class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
                Add Funds
              </button>
            </div>
          </div>

         
    </div>
  </div>
@endsection