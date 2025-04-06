<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use App\Http\Requests\EntrepriseRegisterRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('email' , '=' , $request['email'])->first();
        
        if($user && Hash::check($request["password"], $user->password)){

            if($user->role == 'hunter'){
                return to_route("hunterDashboard");
            }elseif($user->role == 'entreprise'){
                return to_route("entrepriseDashboard");
            }elseif($user->role == 'admin'){
                return to_route("adminDashboard");
            }else{
                return back();
            }

        }else{
            echo $user["password"] . $request["password"];
        }
    }

    public function logout(){
        
    }
}