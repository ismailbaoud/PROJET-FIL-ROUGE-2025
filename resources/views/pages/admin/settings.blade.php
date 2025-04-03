@extends('layouts.app')


@Section('main')
  <div class="flex h-screen bg-gray-50">
      <!-- Sidebar -->
      <div class="w-64 bg-white h-full flex flex-col">
        <div class="p-6 font-bold text-[#111827]">
          Admin Panel
        </div>
      @include('partials.admin.sidebar')
      </div>
  
    <!-- Main Content -->
    <div class="flex-1 flex flex-col bg-gradient-to-r from-white via-white via-5% to-[#E8F5E9]">
      <!-- Header -->
      <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
        <h2 class="text-lg font-medium text-gray-900">Paramètres</h2>
        <div class="flex items-center gap-3">
          <span class="text-sm text-gray-600">Admin</span>
          <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
            A
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
        <div class="max-w-7xl mx-auto">
            
        </div>
      </main>
    </div>
  </div>
@endsection