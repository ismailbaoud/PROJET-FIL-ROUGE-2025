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
      $profile = Profile::find(Auth::user()->id);
      return view('pages.entreprise/settings', compact('user', 'profile'));
   }

   public function update(Request $request){
      $user = User::find(Auth::user()->id);
      $profile = Profile::find(Auth::user()->id);

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
   
}
