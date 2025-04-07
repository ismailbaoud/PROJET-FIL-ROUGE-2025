@extends('layouts.app')


@Section('main')
  <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <div class="w-64 bg-gray-100 h-full flex flex-col">
        <div class="p-6 font-bold text-[#111827]">
          Admin Panel
        </div>
      @include('partials.admin.sidebar')
      </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col bg-gradient-to-r from-white via-white via-5% to-[#E8F5E9]">
      <!-- Header -->
      <header class="flex items-center  justify-between border-b border-gray-200 px-6 py-4">
        <h2 class="text-lg font-medium text-gray-900">User Management</h2>
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
          <!-- User Management Controls -->
          <div class="flex justify-between items-center mb-6">
            <div class="flex gap-3">
              <div class="relative">
                <input type="text" placeholder="Search users..." class="w-64 pl-4 pr-4 py-2 border border-gray-200 rounded-md text-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
              </div>
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Roles</option>
                <option>Admin</option>
                <option>Researcher</option>
                <option>Company</option>
                <option>Moderator</option>
              </select>
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Status</option>
                <option>Active</option>
                <option>Suspended</option>
                <option>Pending</option>
                <option>Deactivated</option>
              </select>
            </div>
            <button class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
              Add New User
            </button>
          </div>

          <!-- User Stats -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Total Users</div>
              <div class="mt-1 text-2xl font-semibold text-gray-900">2,543</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Active Users</div>
              <div class="mt-1 text-2xl font-semibold text-green-600">2,103</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">New This Month</div>
              <div class="mt-1 text-2xl font-semibold text-blue-600">128</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Suspended</div>
              <div class="mt-1 text-2xl font-semibold text-red-600">24</div>
            </div>
          </div>

          <!-- Users Table -->
          <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Joined
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last Active
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <!-- User Row 1 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">
                        JS
                      </div>
                      <div class="text-sm font-medium text-gray-900">John Smith</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    john.smith@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Researcher
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Jan 15, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 18, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </div>
                  </td>
                </tr>

                <!-- User Row 2 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3">
                        SJ
                      </div>
                      <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    sarah.johnson@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                      Admin
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Nov 3, 2024
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 19, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </div>
                  </td>
                </tr>

                <!-- User Row 3 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-3">
                        MC
                      </div>
                      <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    michael.chen@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Researcher
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Suspended
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Feb 8, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 10, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-green-600 hover:text-green-900">Activate</button>
                    </div>
                  </td>
                </tr>

                <!-- User Row 4 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 mr-3">
                        AR
                      </div>
                      <div class="text-sm font-medium text-gray-900">Alex Rodriguez</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    alex.rodriguez@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      Company
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Dec 12, 2024
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 17, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </div>
                  </td>
                </tr>

                <!-- User Row 5 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 mr-3">
                        EW
                      </div>
                      <div class="text-sm font-medium text-gray-900">Emma Wilson</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    emma.wilson@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Researcher
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      Pending
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 15, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 15, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-green-600 hover:text-green-900">Approve</button>
                    </div>
                  </td>
                </tr>

                <!-- User Row 6 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 mr-3">
                        DP
                      </div>
                      <div class="text-sm font-medium text-gray-900">David Park</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    david.park@example.com
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                      Moderator
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Jan 5, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 18, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">Edit</button>
                      <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="flex items-center justify-between mt-6">
            <div class="text-sm text-gray-500">
              Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">2,543</span> users
            </div>
            <div class="flex space-x-2">
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                Previous
              </button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                Next
              </button>
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- Add User Modal (Hidden by default) -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="add-user-modal">
      <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900">Add New User</h3>
            <button class="text-gray-400 hover:text-gray-500">
              <span class="sr-only">Close</span>
              ✕
            </button>
          </div>
          <form>
            <div class="space-y-4">
              <div>
                <label for="full-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="full-name" name="full-name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select id="role" name="role" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  <option>Researcher</option>
                  <option>Company</option>
                  <option>Moderator</option>
                  <option>Admin</option>
                </select>
              </div>
              <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Temporary Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="send-invite" name="send-invite" type="checkbox" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                  <label for="send-invite" class="font-medium text-gray-700">Send invitation email</label>
                  <p class="text-gray-500">The user will receive an email with login instructions.</p>
                </div>
              </div>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
              <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                Cancel
              </button>
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                Add User
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit User Modal (Hidden by default) -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="edit-user-modal">
      <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900">Edit User</h3>
            <button class="text-gray-400 hover:text-gray-500">
              <span class="sr-only">Close</span>
              ✕
            </button>
          </div>
          <form>
            <div class="space-y-4">
              <div>
                <label for="edit-full-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="edit-full-name" name="edit-full-name" value="John Smith" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div>
                <label for="edit-email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="edit-email" name="edit-email" value="john.smith@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div>
                <label for="edit-role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select id="edit-role" name="edit-role" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  <option selected>Researcher</option>
                  <option>Company</option>
                  <option>Moderator</option>
                  <option>Admin</option>
                </select>
              </div>
              <div>
                <label for="edit-status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="edit-status" name="edit-status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                  <option selected>Active</option>
                  <option>Suspended</option>
                  <option>Pending</option>
                  <option>Deactivated</option>
                </select>
              </div>
              <div>
                <button type="button" class="text-blue-600 hover:text-blue-800 text-sm">
                  Reset Password
                </button>
              </div>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
              <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                Cancel
              </button>
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection