<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $programs = Program::with('entreprise')
            ->withCount('reports')
            ->where('status', 'accepte')
            ->latest()
            ->when($request->filled('program_name'), fn($q) => 
                $q->where('name', 'LIKE', '%' . $request->program_name . '%')
            )
            ->paginate(2)
            ->withQueryString();
        

            $reports = Report::with(['user', 'program'])
                ->where('user_id', Auth::id())
                ->latest()
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->paginate(2)
                ->withQueryString()
                ->map(function ($report) {
                    $report->time_diff = $report->created_at->diffForHumans();
                    return $report;
                });

            $totalReports = Report::where('user_id', Auth::Id())->count();
            $validatedReports = Report::where('status', 'resolved')->where('user_id', Auth::Id())->count();

            return view('pages.hunter/hunter', compact('programs', 'reports', 'totalReports', 'validatedReports'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load dashboard: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}