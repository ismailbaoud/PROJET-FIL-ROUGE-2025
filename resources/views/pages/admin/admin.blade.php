<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            success: '#22c55e',
            info: '#0ea5e9',
            warning: '#f59e0b',
            danger: '#ef4444'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-[#f3f4f6]">
  <div class="flex h-screen bg-[#f3f4f6]">
    <!-- Sidebar -->
    <div class="w-64 bg-white h-full flex flex-col">
      <div class="p-6 font-bold text-[#111827]">
        Admin Panel
      </div>
      <nav class="mt-6">
        <ul class="space-y-1">
            <li>
                <a href="/dm/dashboard" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/dm/users" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                    <span class="ml-3">Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="/dm/programs" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Programmes</span>
                </a>
            </li>
            <li>
                <a href="/dm/reports" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Rapports</span>
                </a>
            </li>
            <li>
                <a href="/dm/transactions" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Transactions</span>
                </a>
            </li>
            <li>
                <a href="/dm/green-rooms" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Green Rooms</span>
                </a>
            </li>
            <li>
                <a href="/dm/logs" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Logs</span>
                </a>
            </li>
            <li>
                <a href="/dm/settings" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                     <span class="ml-3">Paramètres</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
      <div class="p-6">
        <!-- Header -->
        <h1 class="text-2xl font-semibold text-[#111827] mb-2">Dashboard Overview</h1>
        <p class="text-[#6b7280] mb-6">System status and key metrics</p>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
          <div class="bg-white rounded-md p-6">
            <div class="text-sm text-[#6b7280] mb-2">Active Users</div>
            <div class="text-3xl font-semibold text-[#111827] mb-2">2,847</div>
            <div class="text-sm text-success">+12% from last month</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-sm text-[#6b7280] mb-2">Total Programs</div>
            <div class="text-3xl font-semibold text-[#111827] mb-2">156</div>
            <div class="text-sm text-success">+3 new today</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-sm text-[#6b7280] mb-2">Total Payouts</div>
            <div class="text-3xl font-semibold text-[#111827] mb-2">$1.2M</div>
            <div class="text-sm text-[#6b7280]">This month</div>
          </div>
          <div class="bg-white rounded-md p-6">
            <div class="text-sm text-[#6b7280] mb-2">System Alerts</div>
            <div class="text-3xl font-semibold text-[#111827] mb-2">7</div>
            <div class="text-sm text-danger">2 critical</div>
          </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
          <!-- Recent User Activity -->
          <div class="bg-white rounded-md p-6">
            <h2 class="text-xl font-semibold text-[#111827] mb-4">Recent User Activity</h2>
            
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    JD
                  </div>
                  <div>
                    <div class="text-[#111827] font-medium">John Doe</div>
                    <div class="text-[#6b7280] text-sm">New registration</div>
                  </div>
                </div>
                <button class="text-info hover:underline">Review</button>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    AS
                  </div>
                  <div>
                    <div class="text-[#111827] font-medium">Alice Smith</div>
                    <div class="text-[#6b7280] text-sm">Account flagged</div>
                  </div>
                </div>
                <button class="text-info hover:underline">Investigate</button>
              </div>
            </div>
          </div>

          <!-- Security Alerts -->
          <div class="bg-white rounded-md p-6">
            <h2 class="text-xl font-semibold text-[#111827] mb-4">Security Alerts</h2>
            
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-[#111827] font-medium">Failed Login Attempts</div>
                  <div class="text-[#6b7280] text-sm">Multiple attempts from IP 192.168.1.1</div>
                </div>
                <div class="text-[#6b7280] text-sm">5 min ago</div>
              </div>
              
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-[#111827] font-medium">Suspicious Activity</div>
                  <div class="text-[#6b7280] text-sm">Unusual API access pattern detected</div>
                </div>
                <div class="text-[#6b7280] text-sm">23 min ago</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Report Moderation Queue -->
        <div class="bg-white rounded-md p-6">
          <h2 class="text-xl font-semibold text-[#111827] mb-4">Report Moderation Queue</h2>
          
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="border-b border-[#e5e7eb]">
                  <th class="text-left py-3 px-4 text-[#6b7280] font-medium">Report ID</th>
                  <th class="text-left py-3 px-4 text-[#6b7280] font-medium">Type</th>
                  <th class="text-left py-3 px-4 text-[#6b7280] font-medium">Submitted By</th>
                  <th class="text-left py-3 px-4 text-[#6b7280] font-medium">Status</th>
                  <th class="text-left py-3 px-4 text-[#6b7280] font-medium">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-[#e5e7eb]">
                  <td class="py-3 px-4 text-[#111827]">#REP-2025-001</td>
                  <td class="py-3 px-4 text-[#111827]">Vulnerability</td>
                  <td class="py-3 px-4 text-[#111827]">security_expert</td>
                  <td class="py-3 px-4 text-[#111827]">Pending</td>
                  <td class="py-3 px-4">
                    <button class="text-info hover:underline">Review</button>
                  </td>
                </tr>
                <tr>
                  <td class="py-3 px-4 text-[#111827]">#REP-2025-002</td>
                  <td class="py-3 px-4 text-[#111827]">Dispute</td>
                  <td class="py-3 px-4 text-[#111827]">ethical_hacker</td>
                  <td class="py-3 px-4 text-[#111827]">In Progress</td>
                  <td class="py-3 px-4">
                    <button class="text-info hover:underline">Review</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>