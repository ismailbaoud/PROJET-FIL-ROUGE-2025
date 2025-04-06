<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use App\Http\Requests\EntrepriseRegisterRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Models\User;
use App\Models\Profile;

class AuthController extends Controller {

    protected $AuthService;

    public function __construct(AuthService $AuthService)
    {
        $this->AuthService = $AuthService;
    }


    public function showRegisterHunter() {

        return view( 'auth.register_hunter' );
        
    }

    public function HunterRegister(HunterRegisterRequest $request ) {

        $this->AuthService->createUserHunter($request->validated());
        return $this->showLogin();
    }

    public function showRegisterEntreprise() {

        return view( 'auth.register_entreprise' );

    }

    public function EntrepriseRegister(EntrepriseRegisterRequest $request ) {

        $this->AuthService->createUserEntreprise($request->validated());
        // $this->AuthService->createProfile($request->validated());
        return $this->showLogin();
    }

    public function showLogin() {

        return view( 'auth.login' );

    }

    public function Login(Request $request) {

        $route = $this->AuthService->login($request);
        if($route){
        return to_route($route);
        }else{
            return back();
        }
    }

    public function logout(){
        
    }
}