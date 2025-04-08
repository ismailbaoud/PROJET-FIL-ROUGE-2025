<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function login(array $data)
{
    
    $credentials = [
        'email' => $data['email'],
        'password' => $data['password'],
    ];

    if (Auth::attempt($credentials)) {

        $user = Auth::user();

        return match ($user->role) {
            'hunter' => 'hunterDashboard',
            'entreprise' => 'entrepriseDashboard',
            'admin' => 'adminDashboard',
            default => null,
        };
    }

    return null; 
}

public function logout()
{
    Auth::logout();
}


}
