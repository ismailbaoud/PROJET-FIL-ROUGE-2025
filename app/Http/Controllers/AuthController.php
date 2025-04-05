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

    public function HunterRegister(HunterRegisterRequest $request ) {

        if ( $request[ 'password' ] == $request[ 'confirm-password' ] ) {

            User::create(['userName' => $request['userName'],
                          'email' => $request['email'],
                          'password' => $request['password']
                         ]);

            return $this->showLogin();
        }
    }

   
}