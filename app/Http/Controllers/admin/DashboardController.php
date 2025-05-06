<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller {
    public function index(Request $request)
    {
        try {
            $activeUsers =User::count();
            $totalReports = Report::count();
            $totalPrograms = Program::count();
            $totalPayouts = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->sum('profiles.rewards');
            $reports = Report::with(['user', 'program'])
                ->latest()
                ->paginate(2)
                ->withQueryString();

            $programs = Program::with('users')
                ->latest()
                ->paginate(2)
                ->withQueryString();

            $hunters = User::with('profile')
                ->where('role', 'hunter')
                ->latest()
                ->paginate(2)
                ->withQueryString();

            $entreprises = User::with('profile')
                ->where('role', 'entreprise')
                ->latest()
                ->paginate(2)
                ->withQueryString();

            return view('pages.admin.admin', compact('reports', 'programs', 'hunters', 'entreprises', 'activeUsers', 'totalReports', 'totalPrograms', 'totalPayouts'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load dashboard: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}