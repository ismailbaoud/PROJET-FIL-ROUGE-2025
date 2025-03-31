@extends('layouts.app')


@Section('main')
<div class="flex h-screen bg-white">
    @include('components.sidebar')
    <div class="flex-1 flex flex-col">
      @include('components.header')

      <!-- Main Content Area -->
      <main class="flex-1 p-6 overflow-auto">
        <div class="max-w-7xl mx-auto">
          <!-- Payment Header -->
          <div class="flex justify-between items-center mb-8">
            <div>
              <h2 class="text-2xl font-semibold text-gray-900">Bounty Payments</h2>
              <p class="text-gray-500 mt-1">Process and manage bug bounty rewards for your programs</p>
            </div>
            <div class="flex space-x-3">
              <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50">
                Payment History
              </button>
              <button class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800">
                Add Funds
              </button>
            </div>
          </div>

          <!-- Account Summary Cards -->
          <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Available Balance</div>
              <div class="mt-2 text-3xl font-semibold text-gray-900">$175,250.00</div>
              <div class="mt-2 text-sm text-gray-500">Last deposit: Mar 15, 2025</div>
            </div>
            <div class="bg-white p-6 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Pending Payments</div>
              <div class="mt-2 text-3xl font-semibold text-blue-600">$48,500.00</div>
              <div class="mt-2 text-sm text-gray-500">12 reports awaiting payment</div>
            </div>
            <div class="bg-white p-6 border border-gray-200 rounded-lg">
              <div class="text-sm font-medium text-gray-500">Total Paid (2025)</div>
              <div class="mt-2 text-3xl font-semibold text-green-600">$324,750.00</div>
              <div class="mt-2 text-sm text-gray-500">78 vulnerabilities resolved</div>
            </div>
          </div>

          <!-- Payment Method -->
          <div class="bg-white p-6 border border-gray-200 rounded-lg mb-8">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-lg font-medium text-gray-900">Payment Method</h3>
              <button class="text-blue-600 hover:text-blue-800 text-sm">Change Method</button>
            </div>
            <div class="flex items-center">
              <div class="w-12 h-8 bg-blue-50 rounded flex items-center justify-center mr-4">
                <span class="text-blue-600 font-medium">Visa</span>
              </div>
              <div>
                <div class="text-sm font-medium text-gray-900">Corporate Visa ending in 8765</div>
                <div class="text-xs text-gray-500">Microsoft Corporation • Auto-reload when balance below $50,000</div>
              </div>
            </div>
          </div>

          <!-- Pending Payments Tab Navigation -->
          <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8">
              <a href="#" class="border-b-2 border-blue-500 py-4 px-1 text-sm font-medium text-blue-600">
                Pending Approval (12)
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Processing (3)
              </a>
              <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Completed (78)
              </a>
            </nav>
          </div>

          <!-- Pending Payments Controls -->
          <div class="bg-gray-50 p-4 rounded-lg mb-6 flex flex-wrap gap-4 items-center justify-between">
            <div class="flex gap-3">
              <select class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                <option>All Programs</option>
                <option>Windows Security</option>
                <option>Azure Cloud Services</option>
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
            </div>
            <div class="flex gap-3">
              <button class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                Select All
              </button>
              <button class="px-3 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                Pay Selected
              </button>
            </div>
          </div>

          <!-- Pending Payments Table -->
          <div class="bg-white border border-gray-200 rounded-lg overflow-hidden mb-8">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Report ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Vulnerability
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Program
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Severity
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Researcher
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Reward Amount
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <!-- Payment Row 1 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </td>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    John Smith
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $25,000.00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Pay</button>
                      <button class="text-gray-600 hover:text-gray-900">Adjust</button>
                    </div>
                  </td>
                </tr>

                <!-- Payment Row 2 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </td>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Sarah Johnson
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $40,000.00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Pay</button>
                      <button class="text-gray-600 hover:text-gray-900">Adjust</button>
                    </div>
                  </td>
                </tr>

                <!-- Payment Row 3 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </td>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Michael Chen
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $8,500.00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Pay</button>
                      <button class="text-gray-600 hover:text-gray-900">Adjust</button>
                    </div>
                  </td>
                </tr>

                <!-- Payment Row 4 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </td>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Alex Rodriguez
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $12,000.00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Pay</button>
                      <button class="text-gray-600 hover:text-gray-900">Adjust</button>
                    </div>
                  </td>
                </tr>

                <!-- Payment Row 5 -->
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  </td>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Emma Wilson
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    $5,000.00
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                      <button class="text-blue-600 hover:text-blue-900">View</button>
                      <button class="text-green-600 hover:text-green-900">Pay</button>
                      <button class="text-gray-600 hover:text-gray-900">Adjust</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Bulk Payment Modal (Hidden by default) -->
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="payment-modal">
            <div class="flex items-center justify-center min-h-screen">
              <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                  <h3 class="text-lg font-medium text-gray-900">Process Bulk Payment</h3>
                  <button class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    ✕
                  </button>
                </div>
                <div class="mb-4">
                  <p class="text-sm text-gray-500">You are about to process payments for 5 selected reports with a total amount of $90,500.00.</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-md mb-4">
                  <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-500">Total Reports:</span>
                    <span class="text-sm font-medium text-gray-900">5</span>
                  </div>
                  <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-500">Total Amount:</span>
                    <span class="text-sm font-medium text-gray-900">$90,500.00</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-sm text-gray-500">Processing Fee (2%):</span>
                    <span class="text-sm font-medium text-gray-900">$1,810.00</span>
                  </div>
                  <div class="border-t border-gray-200 mt-2 pt-2 flex justify-between">
                    <span class="text-sm font-medium text-gray-900">Total Charge:</span>
                    <span class="text-sm font-medium text-gray-900">$92,310.00</span>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                  <div class="flex items-center p-3 border border-gray-300 rounded-md">
                    <div class="w-8 h-6 bg-blue-50 rounded flex items-center justify-center mr-3">
                      <span class="text-blue-600 text-xs font-medium">Visa</span>
                    </div>
                    <div class="text-sm text-gray-900">Corporate Visa ending in 8765</div>
                  </div>
                </div>
                <div class="flex justify-end space-x-3">
                  <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                    Cancel
                  </button>
                  <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                    Confirm Payment
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Add Funds Modal (Hidden by default) -->
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="add-funds-modal">
            <div class="flex items-center justify-center min-h-screen">
              <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                  <h3 class="text-lg font-medium text-gray-900">Add Funds to Account</h3>
                  <button class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    ✕
                  </button>
                </div>
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-1">Amount to Add</label>
                  <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" value="100,000.00">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">USD</span>
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                  <div class="flex items-center p-3 border border-gray-300 rounded-md">
                    <div class="w-8 h-6 bg-blue-50 rounded flex items-center justify-center mr-3">
                      <span class="text-blue-600 text-xs font-medium">Visa</span>
                    </div>
                    <div class="text-sm text-gray-900">Corporate Visa ending in 8765</div>
                  </div>
                </div>
                <div class="flex justify-end space-x-3 mt-6">
                  <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 text-sm">
                    Cancel
                  </button>
                  <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                    Add Funds
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection