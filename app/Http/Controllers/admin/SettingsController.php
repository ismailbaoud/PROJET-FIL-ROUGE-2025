<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    public function index()
    {
        try {
            return view('pages.admin.settings');
        } catch (\Exception $e) {
            Alert::toast('Failed to load settings: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'userName' => 'required|string|max:255' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        try {
            $user->update([
                'username' => $request->userName,
                'email' => $request->email,
            ]);

            Alert::toast('User updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update user: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}