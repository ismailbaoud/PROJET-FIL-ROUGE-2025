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

        <!-- Active Programs -->
        <div class="mb-8">
          <h2 class="text-xl font-semibold text-[#111827] mb-4">Active Programs</h2>
          <div class="bg-white rounded-md overflow-hidden">
            <div class="grid grid-cols-4 p-4 border-b border-[#e5e7eb] text-[#6b7280]">
              <div>Program Name</div>
              <div class="text-right">Status</div>
              <div class="text-right">Reports</div>
              <div class="text-right">Rewards</div>
            </div>
            <div class="grid grid-cols-4 p-4 border-b border-[#e5e7eb]">
              <div class="text-[#111827]">Web Application Security</div>
              <div class="text-right">
                <span class="text-success">Active</span>
              </div>
              <div class="text-right text-[#111827]">24</div>
              <div class="text-right text-[#111827]">$12,000</div>
            </div>
            <div class="grid grid-cols-4 p-4">
              <div class="text-[#111827]">Mobile App Security</div>
              <div class="text-right text-[#6b7280]">In Review</div>
              <div class="text-right text-[#111827]">18</div>
              <div class="text-right text-[#111827]">$8,500</div>
            </div>
          </div>
        </div>

        <!-- Recent Reports -->
        <div>
          <h2 class="text-xl font-semibold text-[#111827] mb-4">Recent Reports</h2>
          <div class="space-y-4">
            <div class="bg-white rounded-md p-4">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    AS
                  </div>
                  <div>
                    <div class="text-[#111827] font-medium">SQL Injection Vulnerability</div>
                    <div class="text-[#6b7280] text-sm">Reported by Alice Smith • 2 hours ago</div>
                  </div>
                </div>
                <div class="bg-[#f3f4f6] text-[#6b7280] px-3 py-1 rounded-full text-sm">
                  Under Review
                </div>
              </div>
            </div>
            <div class="bg-white rounded-md p-4">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    BJ
                  </div>
                  <div>
                    <div class="text-[#111827] font-medium">XSS in Search Function</div>
                    <div class="text-[#6b7280] text-sm">Reported by Bob Johnson • 5 hours ago</div>
                  </div>
                </div>
                <div class="bg-successLight text-success px-3 py-1 rounded-full text-sm">
                  Approved
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection