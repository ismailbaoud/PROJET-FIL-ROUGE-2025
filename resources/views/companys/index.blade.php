@extends('layouts.app')

@Section('main')
 <div class="flex h-screen">
        <div class="w-64 bg-white shadow-md flex flex-col p-5">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">HappyHunt</h1>
            <nav class="flex-1">
                <ul>
                    <li class="py-2 px-4 bg-gray-200 rounded-md"><a href="#" class="text-gray-900 font-semibold">Dashboard</a></li>
                    <li class="py-2 px-4 hover:bg-gray-200 rounded-md"><a href="#" class="text-gray-600">My Programs</a></li>
                    <li class="py-2 px-4 hover:bg-gray-200 rounded-md"><a href="#" class="text-gray-600">Reports</a></li>
                    <li class="py-2 px-4 hover:bg-gray-200 rounded-md"><a href="#" class="text-gray-600">Payments</a></li>
                    <li class="py-2 px-4 hover:bg-gray-200 rounded-md"><a href="#" class="text-gray-600">Messages</a></li>
                    <li class="py-2 px-4 hover:bg-gray-200 rounded-md"><a href="#" class="text-gray-600">Settings</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="flex-1 p-8 overflow-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <input type="text" placeholder="Search..." class="w-96 p-2 border rounded-md" />
                <div class="flex items-center gap-3">
                    <span class="text-gray-800">Ismail Baoud</span>
                    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                </div>
            </div>

            <!-- Welcome Message -->
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome back, Ismail!</h1>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-4 mb-8">
                <div class="bg-white p-6 rounded-md shadow-md text-center">
                    <div class="text-3xl font-bold">12</div>
                    <div class="text-gray-600">Active Programs</div>
                </div>
                <div class="bg-white p-6 rounded-md shadow-md text-center">
                    <div class="text-3xl font-bold">45</div>
                    <div class="text-gray-600">Pending Reports</div>
                </div>
                <div class="bg-white p-6 rounded-md shadow-md text-center">
                    <div class="text-3xl font-bold">$24.5k</div>
                    <div class="text-gray-600">Rewards Paid</div>
                </div>
                <div class="bg-white p-6 rounded-md shadow-md text-center">
                    <div class="text-3xl font-bold">89%</div>
                    <div class="text-gray-600">Response Rate</div>
                </div>
            </div>

            <!-- Active Programs Table -->
            <h2 class="text-xl font-bold text-gray-900 mb-4">Active Programs</h2>
            <table class="w-full bg-white shadow-md rounded-md overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Program Name</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Reports</th>
                        <th class="p-3 text-left">Rewards</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-3">Web Application Security</td>
                        <td class="p-3 text-green-600">Active</td>
                        <td class="p-3">24</td>
                        <td class="p-3">$12,000</td>
                    </tr>
                    <tr>
                        <td class="p-3">Mobile App Security</td>
                        <td class="p-3 text-yellow-500">In Review</td>
                        <td class="p-3">18</td>
                        <td class="p-3">$8,500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  @endsection