<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        try {
            $users = User::with('profile')
                ->when($request->filled('role'), fn($q) => $q->where('role', $request->role))
                ->latest()
                ->paginate(6)
                ->withQueryString();

            $totalUsers = User::count();
            $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            return view('pages.admin.user_management', compact('users', 'totalUsers', 'newUsersThisMonth'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load users: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            Alert::toast('User deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete User: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}