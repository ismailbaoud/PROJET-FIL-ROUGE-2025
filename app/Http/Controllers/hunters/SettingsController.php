<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Scope;
use App\Models\Program;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

   //index
   public function index(){
    return view('pages.hunter/settings');
   }

   
}
