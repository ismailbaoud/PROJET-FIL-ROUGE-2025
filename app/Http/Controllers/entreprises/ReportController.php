<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
    
        $reports = Report::with('program')
            ->whereHas('program', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->paginate(6);

        return view('pages.entreprise.reports', compact('reports'));
    }


    //create
    public function create(Request $request){
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


    //show
    public function show($id){
        $report = Report::with(['user', 'program'])->findOrFail($id);
        return view('pages.reports.show', compact('report'));
    }


    //update status
    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|string|in:open,closed,pending',
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Report status updated successfully!');
    }

    //delete
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();

        return back()->with('success', 'Report deleted successfully!');
    }

    
}
