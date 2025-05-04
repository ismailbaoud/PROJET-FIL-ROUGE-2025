<?php

namespace App\Http\Controllers\entreprises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $programs = Program::with('user')
                ->where('user_id', Auth::id())
                ->latest()
                ->when($request->filled('program_name'), fn($q) => $q->where('name', 'LIKE', '%' . $request->program_name . '%'))
                ->paginate(3)
                ->withQueryString();

            $programIds = $programs->pluck('id');

            $reports = Report::with(['user', 'program'])
                ->whereIn('program_id', $programIds)
                ->latest()
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->paginate(4)
                ->withQueryString();

            return view('pages.entreprise.entreprise', compact('programs', 'reports'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load dashboard: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}