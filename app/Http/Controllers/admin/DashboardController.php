<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $activeUsers = User::where('status', 'active')->count();
            $totalReports = Report::count();
            $totalPrograms = Program::count();
            $totalPayouts = User::with('profile')->sum('profile.rewards');

            $reports = Report::with(['user', 'program'])
                ->latest()
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->paginate(2)
                ->withQueryString();

            $programs = Program::with('user')
                ->latest()
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->paginate(2)
                ->withQueryString();

            $hunters = User::with('profile')
                ->where('role', 'hunter')
                ->where('status', 'en_attente')
                ->latest()
                ->paginate(2)
                ->withQueryString();

            $entreprises = User::with('profile')
                ->where('role', 'entreprise')
                ->where('status', 'en_attente')
                ->latest()
                ->paginate(2)
                ->withQueryString();

            return view('pages.admin.dashboard', compact('reports', 'programs', 'hunters', 'entreprises', 'activeUsers', 'totalReports', 'totalPrograms', 'totalPayouts'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load dashboard: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}