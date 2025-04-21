<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    //index
    public function index(){
        $user = Auth::user();
        $programs = $user->joinedPrograms;
        $reports = $user->reports()->with('program')->get();

        return view('pages.hunter/reports' , compact('programs', 'reports'));
    }


    //create
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
            'program_id' => 'required',
            'severity' => 'required'
        ]);
        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'severitie' => $request->severity,
            'user_id' => Auth::user()->id,
            'program_id' => $request->program_id,
        ]);

        return back()->with('success', 'Report created successfully!');
    }


    //show
    public function show(){

        return view('pages.hunter/reportDetails');
    }


    //update
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
    public function destroy(Report $report)
    {
        try {
            $report->delete();
            return back()->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the report.');
        }
    }
    
}
