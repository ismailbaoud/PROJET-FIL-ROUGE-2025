@extends('layouts.app')

@Section('main')
<div class="flex h-screen bg-white">
  @include('components.sidebar')
  <div class="flex-1 flex flex-col">
    @include('components.header')
      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
        <div class="max-w-4xl mx-auto">
          <!-- Settings Header -->
          <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900">Settings</h2>
            <p class="text-gray-500 mt-1">Manage your account preferences and configurations</p>
          </div>

          <!-- Settings Navigation -->
          <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8">
              <a href="#" class="border-b-2 border-blue-500 py-4 px-1 text-sm font-medium text-blue-600">
                General
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Security
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Notifications
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Billing
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                API
              </a>
            </nav>
          </div>

          <!-- Profile Section -->
          <div class="bg-white border border-gray-200 rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
              <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
            </div>
            <div class="p-6">
              <div class="flex items-start mb-6">
                <div class="mr-6">
                  <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-2xl">
                    IB
                  </div>
                </div>
                <div class="flex-1">
                  <div class="mb-4">
                    <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                      Upload Photo
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-gray-700 text-sm ml-2">
                      Remove
                    </button>
                  </div>
                  <p class="text-sm text-gray-500">
                    Recommended dimensions: 200x200 pixels. Maximum file size: 5MB.
                  </p>
                </div>
              </div>

              <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                  <div>
                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" id="first-name" name="first-name" value="Ismail" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  </div>
                  <div>
                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" id="last-name" name="last-name" value="Baoud" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  </div>
                </div>

                <div class="mb-6">
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                  <input type="email" id="email" name="email" value="ismail.baoud@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                  <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                  <div class="flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                      happyhunt.com/
                    </span>
                    <input type="text" id="username" name="username" value="ismailbaoud" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  </div>
                </div>

                <div class="mb-6">
                  <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                  <textarea id="bio" name="bio" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">Security researcher with expertise in web application security and network penetration testing.</textarea>
                  <p class="mt-1 text-sm text-gray-500">Brief description for your profile. Maximum 200 characters.</p>
                </div>
              </form>
            </div>
          </div>

          <!-- Account Settings Section -->
          <div class="bg-white border border-gray-200 rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
              <h3 class="text-lg font-medium text-gray-900">Account Settings</h3>
            </div>
            <div class="p-6">
              <form>
                <div class="mb-6">
                  <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                  <select id="language" name="language" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>English (US)</option>
                    <option>French</option>
                    <option>German</option>
                    <option>Spanish</option>
                    <option>Arabic</option>
                    <option>Chinese (Simplified)</option>
                  </select>
                </div>

                <div class="mb-6">
                  <label for="timezone" class="block text-sm font-medium text-gray-700 mb-1">Time Zone</label>
                  <select id="timezone" name="timezone" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>(GMT-05:00) Eastern Time (US & Canada)</option>
                    <option>(GMT+00:00) UTC</option>
                    <option>(GMT+01:00) Central European Time</option>
                    <option>(GMT+08:00) China Standard Time</option>
                    <option>(GMT+09:00) Japan Standard Time</option>
                  </select>
                </div>

                <div class="mb-6">
                  <label for="date-format" class="block text-sm font-medium text-gray-700 mb-1">Date Format</label>
                  <select id="date-format" name="date-format" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>MM/DD/YYYY</option>
                    <option>DD/MM/YYYY</option>
                    <option>YYYY-MM-DD</option>
                  </select>
                </div>

                <div class="mb-6">
                  <div class="flex items-center justify-between">
                    <div>
                      <h4 class="text-sm font-medium text-gray-900">Two-Factor Authentication</h4>
                      <p class="text-sm text-gray-500 mt-1">Add an extra layer of security to your account</p>
                    </div>
                    <div class="flex items-center">
                      <span class="mr-3 text-sm text-gray-500">Disabled</span>
                      <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                        Enable
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Privacy Settings Section -->
          <div class="bg-white border border-gray-200 rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
              <h3 class="text-lg font-medium text-gray-900">Privacy Settings</h3>
            </div>
            <div class="p-6">
              <form>
                <div class="mb-6">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="profile-visibility" name="profile-visibility" type="checkbox" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="profile-visibility" class="font-medium text-gray-700">Public Profile</label>
                      <p class="text-gray-500">Allow other researchers and companies to view your profile</p>
                    </div>
                  </div>
                </div>

                <div class="mb-6">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="activity-visibility" name="activity-visibility" type="checkbox" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="activity-visibility" class="font-medium text-gray-700">Activity Visibility</label>
                      <p class="text-gray-500">Show your activity on public leaderboards and statistics</p>
                    </div>
                  </div>
                </div>

                <div class="mb-6">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="contact-researchers" name="contact-researchers" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="contact-researchers" class="font-medium text-gray-700">Contact from Researchers</label>
                      <p class="text-gray-500">Allow other researchers to contact you directly</p>
                    </div>
                  </div>
                </div>

                <div class="mb-6">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="contact-companies" name="contact-companies" type="checkbox" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="contact-companies" class="font-medium text-gray-700">Contact from Companies</label>
                      <p class="text-gray-500">Allow companies to contact you about private programs</p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Connected Accounts Section -->
          <div class="bg-white border border-gray-200 rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
              <h3 class="text-lg font-medium text-gray-900">Connected Accounts</h3>
            </div>
            <div class="p-6">
              <div class="space-y-4">
                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                  <div>
                    <h4 class="text-sm font-medium text-gray-900">GitHub</h4>
                    <p class="text-sm text-gray-500">Connected as @ismailbaoud</p>
                  </div>
                  <button class="text-gray-500 hover:text-gray-700 text-sm">Disconnect</button>
                </div>

                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                  <div>
                    <h4 class="text-sm font-medium text-gray-900">LinkedIn</h4>
                    <p class="text-sm text-gray-500">Not connected</p>
                  </div>
                  <button class="text-blue-600 hover:text-blue-800 text-sm">Connect</button>
                </div>

                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                  <div>
                    <h4 class="text-sm font-medium text-gray-900">Twitter</h4>
                    <p class="text-sm text-gray-500">Connected as @ismail_security</p>
                  </div>
                  <button class="text-gray-500 hover:text-gray-700 text-sm">Disconnect</button>
                </div>

                <div class="flex items-center justify-between py-3">
                  <div>
                    <h4 class="text-sm font-medium text-gray-900">Discord</h4>
                    <p class="text-sm text-gray-500">Not connected</p>
                  </div>
                  <button class="text-blue-600 hover:text-blue-800 text-sm">Connect</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Danger Zone Section -->
          <div class="bg-white border border-gray-200 rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200 bg-red-50">
              <h3 class="text-lg font-medium text-red-800">Danger Zone</h3>
            </div>
            <div class="p-6">
              <div class="space-y-6">
                <div>
                  <h4 class="text-sm font-medium text-gray-900">Export Account Data</h4>
                  <p class="text-sm text-gray-500 mt-1">Download all your account data including reports, payments, and personal information.</p>
                  <button class="mt-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                    Request Data Export
                  </button>
                </div>

                <div class="pt-4 border-t border-gray-200">
                  <h4 class="text-sm font-medium text-gray-900">Deactivate Account</h4>
                  <p class="text-sm text-gray-500 mt-1">Temporarily disable your account. You can reactivate it anytime.</p>
                  <button class="mt-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                    Deactivate Account
                  </button>
                </div>

                <div class="pt-4 border-t border-gray-200">
                  <h4 class="text-sm font-medium text-red-600">Delete Account</h4>
                  <p class="text-sm text-gray-500 mt-1">Permanently delete your account and all associated data. This action cannot be undone.</p>
                  <button class="mt-2 px-4 py-2 bg-white border border-red-300 text-red-600 rounded-md hover:bg-red-50 text-sm">
                    Delete Account
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Save Changes Button -->
          <div class="flex justify-end mb-8">
            <button class="px-6 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
              Save Changes
            </button>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection