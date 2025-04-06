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

}
