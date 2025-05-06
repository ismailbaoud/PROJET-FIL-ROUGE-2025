<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profile');
        $profile = $user->profile;

        return view('pages.entreprise.settings', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'companyname' => 'required|string|max:255',
            'companyurl' => 'nullable|url|max:255',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
        ]);

        try {
            $user = Auth::user();
            $profile = $user->profile;

            if (!$profile) {
                throw new \Exception('Profile not found');
            }

            $user->update([
                'username' => $request->username,
            ]);

            $profile->update([
                'companyname' => $request->companyname,
                'companyurl' => $request->companyurl,
                'country' => $request->country,
                'state' => $request->state,
            ]);

            Alert::toast('Profile updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update profile: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function delete()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                throw new \Exception('User not found');
            }

            DB::transaction(function () use ($user) {
                Auth::logout();
                $user->delete();
            });

            Alert::toast('Account deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete account: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('home');
    }
}