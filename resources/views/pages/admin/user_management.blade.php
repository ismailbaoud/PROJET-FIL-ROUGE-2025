@extends('layouts.app')

@section('main')
    <div class="flex h-screen bg-gradient-to-b from-gray-800 to-gray-900">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.admin.header')
            <main class="flex-1 p-6 overflow-auto bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
                <div class="max-w-7xl mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex gap-3">
                            <div class="relative">
                                <input type="text" placeholder="Search users..."
                                    class="w-64 pl-10 pr-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            </div>
                            <select
                                class="px-3 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 text-sm">
                                <option>All Roles</option>
                                <option>Admin</option>
                                <option>Researcher</option>
                                <option>Company</option>
                                <option>Moderator</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 text-center gap-4 mb-6">
                        <div class="bg-gray-800 p-4 border border-gray-600 rounded-xl shadow-lg text-center">
                            <div class="text-sm text-center font-medium text-gray-400 flex items-center gap-2">
                                <i class="fas fa-users text-blue-400"></i>
                                Total Users
                            </div>
                            <div class="mt-1 text-2xl font-semibold text-white">{{ $totalUsers }}</div>
                        </div>
                        <div class="bg-gray-800 p-4 border border-gray-600 rounded-xl shadow-lg">
                            <div class="text-sm text-center font-medium text-gray-400 flex items-center gap-2">
                                <i class="fas fa-user-plus text-blue-400"></i>
                                New This Month
                            </div>
                            <div class="mt-1 text-2xl font-semibold text-blue-400">{{ $newUsersThisMonth }}</div>
                        </div>
                    </div>

                    <div class="bg-gray-800 border border-gray-600 rounded-xl overflow-hidden shadow-lg">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        Joined
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        Last Active
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-200 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-600">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-700/50 transition-all duration-300">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-600/20 flex items-center justify-center text-blue-400 mr-3">
                                                    {{ substr($user->userName, 0, 2) }}
                                                </div>
                                                <div class="text-sm font-medium text-white">{{ $user->userName }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-600/20 text-blue-400">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $user->updated_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <a href="{{ route('deleteUser', $user) }}"
                                                class="flex items-center gap-1 px-2 py-1 text-sm font-semibold text-red-400 hover:text-red-300 transition-all duration-300">
                                                 <i class="fas fa-ban"></i>
                                                 delete
                                             </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin/user.js') }}" defer></script>
@endsection