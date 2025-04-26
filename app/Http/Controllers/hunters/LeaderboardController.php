<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class LeaderboardController extends Controller
{

    //index

    public function index(Request $request)
{
    $sortField = $request->input('filter', 'pointes'); 

    if (!in_array($sortField, ['pointes', 'rewards'])) {
        $sortField = 'pointes'; 
    }

    $profiles = Profile::with('user')
    ->whereHas('user', function($query) {
        $query->where('role', 'hunter');
    })
    ->orderByDesc($sortField)
    ->get();

    foreach ($profiles as $index => $profile) {
        $profile->rank = $index + 1;

    }
    return view('pages.hunter/leaderboard', compact('profiles', 'sortField'));
}


}
