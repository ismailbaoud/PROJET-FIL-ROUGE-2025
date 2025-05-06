<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReportStatusChanged;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // Index - list all reports with filters
    public function index(Request $request)
    {
        $reports = Report::with(['program', 'user.profile'])
            ->whereHas('program', fn($query) => $query->where('user_id', Auth::id()))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('severity'), fn($q) => $q->where('severity', $request->severity))
            ->when($request->filled('program_id'), fn($q) => $q->where('program_id', $request->program_id))
            ->when($request->filled('search'), fn($q) => $q->where('title', 'LIKE', '%' . $request->search . '%'))
            ->paginate(6)
            ->withQueryString();

        $amounts =  User::select('users.username', DB::raw('SUM(reports.reward) as total_reward'))
        ->join('programs', 'programs.user_id', '=', 'users.id')
        ->join('reports', 'reports.program_id', '=', 'programs.id')
        ->where('users.id', Auth::id())
        ->groupBy('users.username')
        ->get();

        return view('pages.entreprise.reports', compact('reports', 'amounts'));
    }

    // Show single report
    public function show($id)
    {
        $report = Report::with(['user', 'program'])->findOrFail($id);
        return view('pages.hunter.report-details', compact('report'));
    }

    // Update report status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        try {
            $report = Report::findOrFail($id);
            $report->update(['status' => $request->status]);

            Mail::to($report->user->email)->send(new ReportStatusChanged($report));

            Alert::toast('Report status updated and email sent successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update report status', 'error');
        }

        return back();
    }

    // Delete report
    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->delete();

            Alert::toast('Report deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete report', 'error');
        }

        return back();
    }
}
