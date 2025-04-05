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
            placeholder="Search leaderboard..." 
            class="w-full max-w-md px-4 py-2 rounded-md bg-lightGray border-0 focus:outline-none focus:ring-1 focus:ring-darkBlue"
          />
        </div>
      </header>

      <!-- Content -->
      <main class="max-w-5xl mx-auto p-6">
        <!-- Leaderboard Table Section -->
        <h1 class="text-2xl font-bold text-darkGray mb-4">Leaderboard</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <table class="w-full border-collapse">
            <thead class="bg-mediumGray">
              <tr>
                <th class="p-3 text-left">Rank</th>
                <th class="p-3 text-left">Hunter</th>
                <th class="p-3 text-left">Points</th>
                <th class="p-3 text-left">Country</th>
                <th class="p-3 text-left">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b hover:bg-lightGray">
                <td class="p-3">1</td>
                <td class="p-3">Alice Smith</td>
                <td class="p-3">1,500</td>
                <td class="p-3">USA</td>
                <td class="p-3 flex space-x-2">
                  <a href="#" class="text-blue-500">✏️ View</a>
                </td>
              </tr>
              <tr class="border-b hover:bg-lightGray">
                <td class="p-3">2</td>
                <td class="p-3">Bob Johnson</td>
                <td class="p-3">1,300</td>
                <td class="p-3">UK</td>
                <td class="p-3 flex space-x-2">
                  <a href="#" class="text-blue-500">✏️ View</a>
                </td>
              </tr>
              <tr class="border-b hover:bg-lightGray">
                <td class="p-3">3</td>
                <td class="p-3">Charlie Lee</td>
                <td class="p-3">1,100</td>
                <td class="p-3">Canada</td>
                <td class="p-3 flex space-x-2">
                  <a href="#" class="text-blue-500">✏️ View</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Add New Hunter Button -->
        <div class="mt-6">
          <a href="#" class="bg-green text-white px-4 py-2 rounded-md hover:bg-green-600">
            ➕ Add New Hunter
          </a>
        </div>
      </main>
    </div>
  </div>
@endsection
