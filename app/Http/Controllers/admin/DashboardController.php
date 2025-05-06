<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
    public function index(Request $request)
    {
        try {
            $activeUsers =User::count();
            
            $totalReports = Report::count();

            $totalPrograms = Program::count();

            $totalPayouts = User::select('users.username', DB::raw('SUM(reports.reward) as total_reward'))
            ->join('programs', 'programs.user_id', '=', 'users.id')
            ->join('reports', 'reports.program_id', '=', 'programs.id')
            ->groupBy('users.username')
            ->get();

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