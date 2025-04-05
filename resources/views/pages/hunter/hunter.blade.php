@extends('layouts.app')


@Section('main')
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-[230px] border-r border-mediumGray flex flex-col">
      <div class="p-6 font-bold text-lg">HappyHunt</div>

      @include('partials.hunter.sidebar')

    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-lightGray">
      <!-- Header -->
      <header class="bg-white p-4 border-b border-mediumGray">
        <div class="max-w-5xl mx-auto">
          <input 
            type="text" 
            placeholder="Search programs..." 
            class="w-full max-w-md px-4 py-2 rounded-md bg-lightGray border-0 focus:outline-none focus:ring-1 focus:ring-darkBlue"
          />
        </div>
      </header>

      <!-- Content -->
      <main class="max-w-5xl mx-auto p-6">
        <!-- Welcome Section -->
        <div class="bg-white p-6 rounded-lg mb-6 flex items-center">
          <div class="h-16 w-16 bg-offWhite rounded-full mr-6"></div>
          <div>
            <h1 class="text-xl font-semibold mb-1">Welcome back, CyberHunter</h1>
            <p class="text-darkGray text-sm">Keep up the great work! You're in the top 5% this month.</p>
          </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <div class="bg-white p-6 rounded-lg">
            <div class="text-sm text-darkGray mb-1">Total Reports</div>
            <div class="text-2xl font-bold">247</div>
          </div>
          <div class="bg-white p-6 rounded-lg">
            <div class="text-sm text-darkGray mb-1">Validated Reports</div>
            <div class="text-2xl font-bold">183</div>
          </div>
          <div class="bg-white p-6 rounded-lg">
            <div class="text-sm text-darkGray mb-1">Total Earnings</div>
            <div class="text-2xl font-bold">$24,750</div>
          </div>
          <div class="bg-white p-6 rounded-lg">
            <div class="text-sm text-darkGray mb-1">Global Rank</div>
            <div class="text-2xl font-bold">#42</div>
          </div>
        </div>

        <!-- Active Programs -->
        <div class="mb-6">
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4">
            <h2 class="text-lg font-semibold">Active Programs</h2>
            <button class="bg-darkBlue hover:bg-black text-white px-4 py-2 rounded-lg text-sm">
              + Report Vulnerability
            </button>
          </div>
          <div class="bg-white rounded-lg overflow-hidden">
            <table class="w-full">
              <thead>
                <tr class="border-b border-mediumGray">
                  <th class="text-left p-4 text-sm font-medium text-darkGray">Company</th>
                  <th class="text-left p-4 text-sm font-medium text-darkGray">Scope</th>
                  <th class="text-left p-4 text-sm font-medium text-darkGray">Rewards</th>
                  <th class="text-left p-4 text-sm font-medium text-darkGray">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-mediumGray">
                  <td class="p-4 text-sm">TechCorp Inc.</td>
                  <td class="p-4 text-sm">Web, API</td>
                  <td class="p-4 text-sm">$100-$10,000</td>
                  <td class="p-4 text-sm">
                    <span class="text-green">Active</span>
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm">SecureBank</td>
                  <td class="p-4 text-sm">Mobile, API</td>
                  <td class="p-4 text-sm">$500-$15,000</td>
                  <td class="p-4 text-sm">
                    <span class="text-green">Active</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

     
      </main>
    </div>
  </div>
@endsection