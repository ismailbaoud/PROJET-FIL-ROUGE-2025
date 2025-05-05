<?php

namespace App\Http\Controllers\admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $reports = Report::with(['program', 'user'])
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->when($request->filled('severity'), fn($q) => $q->where('severity', $request->severity))
                ->orderByDesc('created_at')
                ->paginate(6)
                ->withQueryString();

            return view('pages.admin.reports', compact('reports'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load reports: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function destroy(Report $report)
    {
        try {
            $report->delete();
            Alert::toast('Report deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete report: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}