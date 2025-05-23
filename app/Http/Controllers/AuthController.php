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
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    // Show hunter registration form
    public function showRegisterHunter()
    {
        return view('auth.register-hunter');
    }

    // Handle hunter registration
    public function HunterRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);
    
        if ($data['password'] === $data['password_confirmation']) {
            $user = User::create([
                'username' => $data['username'],
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
        return view('auth.register-entreprise');
    }

    // Handle entreprise registration
    public function EntrepriseRegister(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'businessemail' => 'required|email',
            'password' => 'required|string|min:8',
            'companyname' => 'required|string|max:255',
            'companyurl' => 'required|url',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);


        if (User::where('email', $data['businessemail'])->exists()) {
            return back()->with('error', 'The email address is already in use. Please use a different email.');
        }

        $user = User::create([
            'username' => $data['fullname'],
            'email' => $data['businessemail'],
            'password' => Hash::make($data['password']),
            'role' => 'entreprise'
        ]);

        Profile::create([
            'companyname' => $data['companyname'],
            'companyurl' => $data['companyurl'],
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
                'username' => $userInfo['login'],
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
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Alert::toast('You have been logged out successfully!', 'success');
        return to_route('home');
    }
}
