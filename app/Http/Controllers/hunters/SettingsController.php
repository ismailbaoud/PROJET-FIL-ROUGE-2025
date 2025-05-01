<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\PaymentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{

   //index
   public function index($id){
    $user = User::find($id);
    $profile = Profile::where('user_id', $user->id)->first();
    $paymentInfo = PaymentInfo::where('user_id', $user->id)->first();
    return view('pages.hunter/settings', compact('user', 'profile', 'paymentInfo'));
   }



   public function update(Request $request){
      $user = User::find(Auth::user()->id);
      $profile = Profile::find(Auth::user()->id);

      $user->update([
         'userName' => $request->userName
      ]);

      $profile->update([
         'country' => $request->country,
         'state' => $request->state
      ]);
      return back();
   }


   public function storeOrUpdatePaymentInfo(Request $request){
      $user = Auth::user(); 

      $validated = $request->validate([
          'name' => 'required|string|max:255',
          'address' => 'required|string|max:255',
          'postal_code' => 'required|string|max:20',
          'rib' => 'required|string|max:255',
      ]);

      if ($user->paymentInfo) {
          $user->paymentInfo->update($validated);
      } else {
          $user->paymentInfo()->create($validated);
      }

      return back()->with('success', 'Payment information saved successfully!');
   }

   public function uploadAvatar(Request $request)
   {
       $request->validate([
           'content_vusial' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
   
       $user = auth()->user();
   
       $path = $request->file('content_vusial')->store('avatars', 'public');
   
       $user->profile->update([
           'content_vusial' => $path,
       ]);
       return back()->with('success', 'Profile image updated!');
   }
   
   
}
