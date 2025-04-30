<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReportStatusChanged;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::id();
    
        $reportsQuery = Report::with(['program', 'user.profile'])
            ->whereHas('program', function($query) use ($userId) {
                $query->where('user_id', $userId);
            });
    
        if ($request->filled('status')) {
            $reportsQuery->where('status', $request->status);
        }
    
        if ($request->filled('severity')) {
            $reportsQuery->where('severity', $request->severity);
        }
    
        if ($request->filled('program_id')) {
            $reportsQuery->where('program_id', $request->program_id);
        }
    
        if ($request->filled('search')) {
            $reportsQuery->where('title', 'like', '%' . $request->search . '%');
        }
    
        $reports = $reportsQuery->paginate(6)->withQueryString();
    
        $user = Auth::user();
        $profile = $user->profile;
    
        return view('pages.entreprise.reports', compact('reports', 'profile'));
    }
    
    

    
    

    //create
    public function create(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
            'status' => 'required|string',
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
        $report = Report::with(['user', 'program'])->find($id);
        return view('pages.hunter/reportDetails', compact('report'));
    }


    //update status
    
    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required',
        ]);
    
        $report = Report::find($id);
        $report->update([
            'status' => $request->status,
        ]);
    
        Mail::to($report->user->email)->send(new ReportStatusChanged($report));
    
        return back()->with('success', 'Report status updated and email sent successfully!');
    }
    
    //delete
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();

        return back()->with('success', 'Report deleted successfully!');
    }

    
}
