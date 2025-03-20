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
      </div>
    </div>
  </div>
@endsection