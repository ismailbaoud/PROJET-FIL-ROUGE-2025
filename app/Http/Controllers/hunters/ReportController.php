<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function index(){
        return view('pages.hunter/reports');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
            'status' => 'required|string|in:open,closed,pending',
            'user_id' => 'required|exists:users,id',
            'program_id' => 'required|exists:programs,id',
        ]);

        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'program_id' => $request->program_id,
        ]);

        return back()->with('success', 'Report created successfully!');
    }

    public function read($id)
    {
        $report = Report::with(['user', 'program'])->findOrFail($id);
        return view('pages.reports.show', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
            'status' => 'required|string|in:open,closed,pending',
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Report updated successfully!');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return back()->with('success', 'Report deleted successfully!');
    }
}
