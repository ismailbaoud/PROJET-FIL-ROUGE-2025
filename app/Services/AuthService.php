<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function createUserHunter(array $data) 
    {
        if ( $data[ 'password' ] == $data[ 'confirm-password' ] ) {

            
            User::create(['userName' => $data['userName'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);
        }
    }

    public function createUserEntreprise(array $data) 
    {
        User::create(['userName' => $data['fullName'],
            'email' => $data['businessEmail'],
            'password' => $data['password'],
            'role' => 'entreprise'
        ]);
    }

    public function createProfile(array $data){
        Profile::create([
            'name' => $data['companyName'],
            'url' => $data['accountUrl'],
            'country' =>$data['country'],
            'state' =>$data['state'],
            'user_id' => User::latest()->first()->id
        ]);
    }

    public function login(object $data){
        $user = User::where('email' , '=' , $data['email'])->first();
        
        if($user && Hash::check($data["password"], $user->password)){

            if($user->role == 'hunter'){
                return "hunterDashboard";
            }elseif($user->role == 'entreprise'){
                return "entrepriseDashboard";
            }elseif($user->role == 'admin'){
                return "adminDashboard";
            }else{
                return "";
            }
    }
}
}
