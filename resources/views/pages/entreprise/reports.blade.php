@extends('layouts.app')

@Section('main')
<div class="flex h-screen bg-white">
  @include('components.sidebar')
  <div class="flex-1 flex flex-col">
    @include('components.header')
      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
        <div class="max-w-7xl mx-auto">
          <!-- Reports Header -->
          <div class="flex justify-between items-center mb-8">
            <div>
              <h2 class="text-2xl font-semibold text-gray-900">Security Reports</h2>
              <p class="text-gray-500 mt-1">Manage vulnerability reports across all your programs</p>
            </div>
            <div class="flex space-x-3">
              <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50">
                Export Reports
              </button>
              <button class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
                Generate Analytics
              </button>
            </div>
          </div>

          <!-- Reports Controls -->
          <div class="bg-gray-50 p-4 rounded-lg mb-6 flex flex-wrap gap-4 items-center justify-between">
            <div class="flex gap-3">
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Programs</option>
                <option>Microsoft Windows</option>
                <option>Microsoft Azure</option>
                <option>Microsoft 365</option>
                <option>Xbox Live</option>
              </select>
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Severities</option>
                <option>Critical</option>
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>
              </select>
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Statuses</option>
                <option>New</option>
                <option>Triaging</option>
                <option>Accepted</option>
                <option>Resolved</option>
                <option>Rejected</option>
              </select>
            </div>
            <div class="flex gap-3">
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>Sort: Newest First</option>
                <option>Oldest First</option>
                <option>Highest Severity</option>
                <option>Highest Bounty</option>
              </select>
              <button class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                Bulk Actions
              </button>
            </div>
          </div>

          <!-- Reports Summary Cards -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Total Reports</div>
              <div class="mt-1 text-2xl font-semibold text-gray-900">247</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Pending Review</div>
              <div class="mt-1 text-2xl font-semibold text-blue-600">42</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Accepted</div>
              <div class="mt-1 text-2xl font-semibold text-green-600">183</div>
            </div>
            <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Rejected</div>
              <div class="mt-1 text-2xl font-semibold text-gray-600">22</div>
            </div>
          </div>

          <!-- Reports Table -->
          <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Report ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Program
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Severity
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Reported
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Bounty
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <!-- Report Row 1 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1842
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">Remote Code Execution in Windows Kernel</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Windows Security
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Critical
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Triaging
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 18, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Pending
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Accept</button>
                      <button class="text-red-600 hover:text-red-900">Reject</button>
                    </div>
                  </td>
                </tr>

                <!-- Report Row 2 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1841
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">Authentication Bypass in Azure AD</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Azure Cloud Services
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Critical
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Accepted
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 17, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $40,000
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-purple-600 hover:text-purple-900">Resolve</button>
                      <button class="text-gray-600 hover:text-gray-900">Assign</button>
                    </div>
                  </td>
                </tr>

                <!-- Report Row 3 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1840
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">XSS Vulnerability in SharePoint Online</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Microsoft 365
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                      High
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Accepted
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 16, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $8,500
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-purple-600 hover:text-purple-900">Resolve</button>
                      <button class="text-gray-600 hover:text-gray-900">Assign</button>
                    </div>
                  </td>
                </tr>

                <!-- Report Row 4 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1839
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">SSRF in GitHub Actions</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    GitHub Security
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                      High
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                      Resolved
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 15, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $12,000
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-gray-600 hover:text-gray-900">Reopen</button>
                      <button class="text-gray-600 hover:text-gray-900">Archive</button>
                    </div>
                  </td>
                </tr>

                <!-- Report Row 5 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1838
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">SQL Injection in Dynamics CRM</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Dynamics 365
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      Medium
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      New
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 14, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Pending
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Accept</button>
                      <button class="text-red-600 hover:text-red-900">Reject</button>
                    </div>
                  </td>
                </tr>

                <!-- Report Row 6 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    MS-2025-1837
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">Privilege Escalation in Xbox Live</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Xbox Live
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                      High
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Rejected
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Mar 13, 2025
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $0
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Reconsider</button>
                      <button class="text-gray-600 hover:text-gray-900">Archive</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="flex items-center justify-between mt-6">
            <div class="text-sm text-gray-500">
              Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">247</span> reports
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
  </div>
@endsection