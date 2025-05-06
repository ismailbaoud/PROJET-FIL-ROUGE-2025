<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'filter' => 'nullable|string|in:pointes,rewards',
        ]);

        try {
            $sortField = $request->input('filter', 'pointes');

            $pagination = Profile::with('user')
            ->whereHas('user', fn($query) => $query->where('role', 'hunter'))
            ->orderByDesc($sortField)
            ->paginate(6)
            ->withQueryString();
        
        $profiles = $pagination->through(function ($profile, $index) use ($pagination) {
            $profile->rank = $pagination->firstItem() + $index;
            return $profile;
        });
         
        

            return view('pages.hunter.leaderboard', compact('profiles', 'sortField'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load leaderboard: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}