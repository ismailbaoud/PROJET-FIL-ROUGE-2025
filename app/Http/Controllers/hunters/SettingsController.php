<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\PaymentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\hunter\SettingsRequest;

class SettingsController extends Controller
{
    public function index($id)
    {
        try {
            $user = User::find($id)->load(['profile', 'paymentInfo']);
            $profile = $user->profile;
            $paymentInfo = $user->paymentInfo;

            return view('pages.hunter.settings', compact('user', 'profile', 'paymentInfo'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load settings: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
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
                'userName' => $request->userName,
            ]);

            $profile->update([
                'country' => $request->country,
                'state' => $request->state,
            ]);

            Alert::toast('Profile updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update profile: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function storeOrUpdatePaymentInfo(SettingsRequest $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                throw new \Exception('User not found');
            }

            $data = $request->validated();

            if ($user->paymentInfo) {
                $user->paymentInfo->update($data);
            } else {
                $user->paymentInfo()->create($data);
            }

            Alert::toast('Payment information saved successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to save payment information: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'content_vusial' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $user = Auth::user();
            $profile = $user->profile;

            if (!$profile) {
                throw new \Exception('Profile not found');
            }

            $path = $request->file('content_vusial')->store('avatars', 'public');
            $profile->update([
                'content_vusial' => $path,
            ]);

            Alert::toast('Profile image updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update profile image: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}