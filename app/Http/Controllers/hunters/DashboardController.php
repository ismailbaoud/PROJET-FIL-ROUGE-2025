<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use App\Models\Profile;
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
                ->when($request->filled('program_name'), function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->program_name . '%');
                })
                ->latest()
                ->paginate(2)
                ->withQueryString();
    
            $reports = Report::with(['user', 'program'])
                ->where('user_id', Auth::id())
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->latest()
                ->paginate(2)
                ->withQueryString();
    
            $reports->getCollection()->transform(function ($report) {
                $report->time_diff = $report->created_at->diffForHumans();
                return $report;
            });
    
            $totalReports = Report::where('user_id', Auth::id())->count();
            $validatedReports = Report::where('user_id', Auth::id())->where('status', 'resolved')->count();

            $rankedUserIds = Profile::whereHas('user', fn($q) => $q->where('role', 'hunter'))
                ->orderByDesc('pointes')
                ->pluck('user_id')
                ->toArray();

            $userRank = array_search(Auth::id(), $rankedUserIds);
            $userRank = $userRank !== false ? $userRank + 1 : null;
    
            return view('pages.hunter.hunter', compact('programs', 'reports', 'totalReports', 'validatedReports', 'userRank'));
    
        } catch (\Exception $e) {
            Alert::toast(' ' . $e->getMessage(), 'error');
            return back();
        }
    }
    
}