<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterHunter(){
        return view('auth.register_hunter');
    }


    public function showRegisterEntreprise(){
        return view('auth.register_entreprise');
    }

    public function showLogin(){
        return view('companys.index');
    }
}
