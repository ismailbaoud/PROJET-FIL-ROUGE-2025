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
          <h1 class="text-2xl font-bold text-darkGray">Hunter Settings</h1>
        </div>
      </header>

      <!-- Content -->
      <main class="max-w-5xl mx-auto p-6">
        <!-- Profile Settings Section -->
        <section class="mb-6">
          <h2 class="text-xl font-semibold text-darkGray mb-4">Profile Settings</h2>
          <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
              <label for="username" class="block text-sm font-medium text-darkGray">Username</label>
              <input 
                type="text" 
                id="username" 
                placeholder="Enter your username" 
                class="w-full mt-2 p-2 border rounded-md focus:ring-1 focus:ring-darkBlue"
              />
            </div>
            <div class="px-6 py-4 border-t">
              <label for="email" class="block text-sm font-medium text-darkGray">Email</label>
              <input 
                type="email" 
                id="email" 
                placeholder="Enter your email" 
                class="w-full mt-2 p-2 border rounded-md focus:ring-1 focus:ring-darkBlue"
              />
            </div>
            <div class="px-6 py-4 border-t">
              <label for="password" class="block text-sm font-medium text-darkGray">Password</label>
              <input 
                type="password" 
                id="password" 
                placeholder="Enter new password" 
                class="w-full mt-2 p-2 border rounded-md focus:ring-1 focus:ring-darkBlue"
              />
            </div>
          </div>
        </section>

        <!-- Notification Settings Section -->
        <section class="mb-6">
          <h2 class="text-xl font-semibold text-darkGray mb-4">Notification Settings</h2>
          <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
              <div class="flex items-center justify-between">
                <label for="emailNotifications" class="text-sm font-medium text-darkGray">Email Notifications</label>
                <input 
                  type="checkbox" 
                  id="emailNotifications" 
                  class="h-4 w-4 text-green focus:ring-0 rounded-md"
                />
              </div>
            </div>
            <div class="px-6 py-4 border-t">
              <div class="flex items-center justify-between">
                <label for="smsNotifications" class="text-sm font-medium text-darkGray">SMS Notifications</label>
                <input 
                  type="checkbox" 
                  id="smsNotifications" 
                  class="h-4 w-4 text-green focus:ring-0 rounded-md"
                />
              </div>
            </div>
          </div>
        </section>

        <!-- Security Settings Section -->
        <section class="mb-6">
          <h2 class="text-xl font-semibold text-darkGray mb-4">Security Settings</h2>
          <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
              <button 
                class="w-full p-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none"
              >
                Delete Account
              </button>
            </div>
          </div>
        </section>

        <!-- Save Changes -->
        <div class="mt-6">
          <button 
            class="w-full p-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none"
          >
            Save Changes
          </button>
        </div>
      </main>
    </div>
  </div>
@endsection