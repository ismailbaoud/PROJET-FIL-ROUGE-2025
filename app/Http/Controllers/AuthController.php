<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use App\Http\Requests\EntrepriseRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    protected $AuthService;

    public function __construct(AuthService $AuthService){
        $this->AuthService = $AuthService;
    }


    //show register hunter
    public function showRegisterHunter() {

        return view('auth.register_hunter');
        
    }


    //hunter register
    public function HunterRegister(HunterRegisterRequest $request ) {

        $this->AuthService->createUserHunter($request->validated());
        return $this->showLogin();
    }


    //show register entreprise
    public function showRegisterEntreprise() {

        return view( 'auth.register_entreprise' );

    }


    //entreprise register
    public function EntrepriseRegister(EntrepriseRegisterRequest $request ) {

        $this->AuthService->createUserEntreprise($request->validated());

        return $this->showLogin();
    }


    //show login
    public function showLogin() {

        return view( 'auth.login' );

    }


    //login
    public function login(Request $request){
        $dashboard = $this->AuthService->login($request->only('email', 'password'));

        if ($dashboard) {
            $request->session()->regenerate();
            return to_route($dashboard);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }


    //logout
    public function logout(Request $request){
        $this->AuthService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }

}