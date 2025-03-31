<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HappyHunt Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            lightGray: "#f8f9fa",
            mediumGray: "#e9ecef",
            darkGray: "#666666",
            darkBlue: "#0d1117",
            green: "#28a745",
            red: "#dc3545",
            yellow: "#ffc107",
            offWhite: "#f0f0f0"
          }
        }
      }
    }
  </script>
</head>
<body class="bg-white">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-[230px] border-r border-mediumGray flex flex-col">
      <div class="p-6 font-bold text-lg">HappyHunt</div>
      <nav class="flex-1 px-4 py-2">
        <div class="space-y-1">
          <div class="bg-offWhite rounded-md px-4 py-3 text-sm font-medium">
            Dashboard
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md">
            Programs
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md">
            My Reports
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md">
            Leaderboard
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md">
            Messages
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md flex items-center">
            <div class="w-3 h-3 mr-2 rounded-full bg-green"></div> Red Room
          </div>
          <div class="text-darkGray px-4 py-3 text-sm font-medium hover:bg-lightGray rounded-md mt-auto">
            Settings
          </div>
        </div>
      </nav>
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

        <!-- Recent Reports -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Recent Reports</h2>
          <div class="space-y-4">
            <div class="bg-white rounded-lg p-4">
              <div class="flex justify-between mb-2">
                <h3 class="font-medium">SQL Injection in Login Form</h3>
                <span class="text-red font-medium">Critical</span>
              </div>
              <p class="text-sm text-darkGray mb-2">TechCorp Inc.</p>
              <p class="text-xs text-darkGray">Submitted 2 days ago • Under Review</p>
            </div>
            <div class="bg-white rounded-lg p-4">
              <div class="flex justify-between mb-2">
                <h3 class="font-medium">XSS Vulnerability in Profile Page</h3>
                <span class="text-yellow font-medium">High</span>
              </div>
              <p class="text-sm text-darkGray mb-2">SecureBank</p>
              <p class="text-xs text-darkGray">Submitted 5 days ago • Accepted</p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>