<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{

   //index
   public function index(){
      $user = Auth::user();
      $profile = $user->profile;
      return view('pages.entreprise/settings', compact('user', 'profile'));
   }

   public function update(Request $request){
      $user = Auth::user();
      $profile = $user->profile;

      $user->update([
         'userName' => $request->userName
      ]);

      $profile->update([
         'companyName' => $request->companyName,
         'companyUrl' => $request->companyUrl,
         'country' => $request->country,
         'state' => $request->state
      ]);
      return back();
   }
   
   public function delete() {
      $user = Auth::user();
  
      Auth::logout();
  
      $user->delete();
  
      return redirect()->route('home');
  }
  
}
