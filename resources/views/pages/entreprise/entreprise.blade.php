@extends('layouts.app')


  <div class="flex h-screen bg-white">
  @Section('main')


    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
      <div class="p-6">
      
        <!-- Welcome -->
        <h1 class="text-2xl font-semibold text-[#111827] mb-6">Welcome back, John!</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
          <div class="bg-white rounded-md p-6">
            <div class="text-3xl font-semibold text-[#111827]">12</div>
            <div class="text-[#6b7280] mt-1">Active Programs</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-3xl font-semibold text-[#111827]">45</div>
            <div class="text-[#6b7280] mt-1">Pending Reports</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-3xl font-semibold text-[#111827]">$24.5k</div>
            <div class="text-[#6b7280] mt-1">Rewards Paid</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-3xl font-semibold text-[#111827]">89%</div>
            <div class="text-[#6b7280] mt-1">Response Rate</div>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-between mb-6">
          <button class="bg-[#111827] hover:bg-[#111827]/90 text-white rounded-md px-4 py-2 flex items-center gap-2">
            <i class="fas fa-plus text-sm"></i> Create New Program
          </button>
          <button class="bg-white text-[#111827] border border-[#e5e7eb] rounded-md px-4 py-2 hover:bg-gray-50">
            View All Reports
          </button>
        </div>

        
      </div>
    </div>
  </div>
@endsection