<?php

namespace App\Http\Controllers;

use App\Http\Requests\HunterRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    // Show hunter registration form
    public function showRegisterHunter()
    {
        return view('auth.register_hunter');
    }

    // Handle hunter registration
    public function HunterRegister(Request $request)
    {
        $data = $request->validate([
            'userName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);
    
        if ($data['password'] === $data['password_confirmation']) {
            $user = User::create([
                'userName' => $data['userName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'hunter',
                'status'=> 'active'
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
    public function EntrepriseRegister(Request $request)
    {
        $data = $request->validate([
            'fullName' => 'required|string|max:255',
            'businessEmail' => 'required|email',
            'password' => 'required|string|min:8',
            'companyName' => 'required|string|max:255',
            'companyUrl' => 'nullable|url',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);


        if (User::where('email', $data['businessEmail'])->exists()) {
            return redirect()->back()->with('error', 'The email address is already in use. Please use a different email.');
        }

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


    public function redirectToGitHub(){
        $query = http_build_query([
            'client_id' => env('GITHUB_CLIENT_ID'),
            'redirect_uri' => env('GITHUB_REDIRECT_URI'),
            'scope' => 'read:user user:email',
            'allow_signup' => 'true',
        ]);

        return redirect('https://github.com/login/oauth/authorize?' . $query);
    }


    public function handleGitHubCallback(Request $request){
        $code = $request->get('code');

        $response = Http::asForm()->post('https://github.com/login/oauth/access_token', [
            'client_id' => env('GITHUB_CLIENT_ID'),
            'client_secret' => env('GITHUB_CLIENT_SECRET'),
            'code' => $code,
            'redirect_uri' => env('GITHUB_REDIRECT_URI'),
        ]);

        parse_str($response->body(), $data);
        $accessToken = $data['access_token'];

        $userInfo = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json'
        ])->get('https://api.github.com/user')->json();

        $userEmail = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json'
        ])->get('https://api.github.com/user/emails')->json();

        $primaryEmail = collect($userEmail)->firstWhere('primary', true)['email'] ?? null;

        $user = User::firstOrCreate(
            ['email' => $primaryEmail],
            [
                'userName' => $userInfo['login'],
                'password' => Hash::make(uniqid()),
                'role' => 'hunter' 
            ]
        );

        if ($user->wasRecentlyCreated) {
            Profile::create([
                'user_id' => $user->id,
                'country' => 'unknown',
                'state' => 'unknown'
            ]);
        }

        Auth::login($user, true);

        return to_route('hunterDashboard');
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
