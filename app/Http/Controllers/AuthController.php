<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use App\Http\Requests\EntrepriseRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show hunter registration form
    public function showRegisterHunter()
    {
        return view('auth.register_hunter');
    }

    // Handle hunter registration
    public function HunterRegister(HunterRegisterRequest $request)
    {
        $data = $request->validated();

        if ($data['password'] === $data['confirm-password']) {
            $user = User::create([
                'userName' => $data['userName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'hunter'
            ]);

            Profile::create([
                'country' => $data['country'],
                'state' => $data['state'],
                'user_id' => $user->id
            ]);

            return $this->showLogin();
        }

        return back()->withErrors([
            'password' => 'Passwords do not match.',
        ]);
    }

    // Show entreprise registration form
    public function showRegisterEntreprise()
    {
        return view('auth.register_entreprise');
    }

    // Handle entreprise registration
    public function EntrepriseRegister(EntrepriseRegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'userName' => $data['fullName'],
            'email' => $data['businessEmail'],
            'password' => Hash::make($data['password']),
            'role' => 'entreprise'
        ]);

        Profile::create([
            'companyName' => $data['companyName'],
            'companyUrl' => $data['companyUrl'],
            'country' => $data['country'],
            'state' => $data['state'],
            'user_id' => $user->id
        ]);

        return $this->showLogin();
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role) {
                'hunter' => to_route('hunterDashboard'),
                'entreprise' => to_route('showEntrepriseDashboard'),
                'admin' => to_route('adminDashboard'),
                default => back()->withErrors(['email' => 'Invalid role.']),
            };
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
