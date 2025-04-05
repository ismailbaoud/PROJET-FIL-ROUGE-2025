<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function showRegisterHunter() {

        return view( 'auth.register_hunter' );
        
    }
}