<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\hunter\ReportRequest;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $reports = $user->reports()
                ->with('program')
                ->latest()
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->when($request->filled('severity'), fn($q) => $q->where('severity', $request->severity))
                ->paginate(6)
                ->withQueryString();

            return view('pages.hunter.reports-index', compact('reports'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load reports: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function store(ReportRequest $request, $id)
    {
        try {
            $program = Program::findOrFail($id);

            $file = $request->file('poc');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            $data = [
                'title' => $request->title,
                'type' => $request->type,
                'target' => $request->target,
                'steps' => $request->steps,
                'impact' => $request->impact,
                'severity' => $request->severity,
                'user_id' => Auth::id(),
                'program_id' => $program->id,
                'poc' => $path,
            ];

            Report::create($data);

            Alert::toast('Report created successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to create report: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:open,closed,pending',
        ]);

        try {
            $report = Report::findOrFail($id);
            $report->update([
                'status' => $request->status,
            ]);

            Alert::toast('Report status updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update report status: ' . $e->getMessage(), 'error');
        }

        return back();
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

    public function showSubmitForm($id)
    {
        try {
            $program = Program::findOrFail($id);
            return view('pages.hunter.report-submit', compact('id'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load submit form: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}