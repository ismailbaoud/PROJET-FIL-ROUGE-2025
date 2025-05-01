@extends('layouts.app')


@Section('main')
    <div class="flex h-screen bg-gray-100">
        @include('partials.admin.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden bg-white">
            @include('partials.admin.header')
            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-7xl mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex gap-3">
                            <div class="relative">
                                <input type="text" placeholder="Search users..."
                                    class="w-64 pl-4 pr-4 py-2 border border-gray-200 rounded-md text-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            </div>
                            <select
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                                <option>All Roles</option>
                                <option>Admin</option>
                                <option>Researcher</option>
                                <option>Company</option>
                                <option>Moderator</option>
                            </select>
                            <select
                                class="px-3 py-2 bg-white border border-gray-200 text-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Suspended</option>
                                <option>Pending</option>
                                <option>Deactivated</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <div class="text-sm font-medium text-gray-500">Total Users</div>
                            <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalUsers }}</div>
                        </div>
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <div class="text-sm font-medium text-gray-500">Active Users</div>
                            <div class="mt-1 text-2xl font-semibold text-green-600">{{$activeUsers}}</div>
                        </div>
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <div class="text-sm font-medium text-gray-500">New This Month</div>
                            <div class="mt-1 text-2xl font-semibold text-blue-600"> {{$newUsersThisMonth}} </div>
                        </div>
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <div class="text-sm font-medium text-gray-500">Suspended</div>
                            <div class="mt-1 text-2xl font-semibold text-red-600">{{ $suspendedUsers }}</div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Joined
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Last Active
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Change status
                                    </th>
                                    <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">
                                                JS
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">{{ $user->userName }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $user->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->updated_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <form action="{{ route('updateUser', $user->id) }}" method="POST" id="updateStatus-{{ $user->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" id="selectItem-{{ $user->id }}">
                                                    <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="panding" {{ $user->status === 'panding' ? 'selected' : '' }}>Panding</option>
                                                    <option value="suspand" {{ $user->status === 'suspand' ? 'selected' : '' }}>Soft Suspend</option>
                                                </select>
                                            </form>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <a href="{{  route('deleteUser' ,$user->id) }}" class="text-red-600 hover:text-red-900">Suspend</a>
                                        <a href="{{  route('deleteUser' ,$user->id) }}" class="text-red-600 hover:text-red-900">view</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin/user.js') }}" defer></script>

@endsection
