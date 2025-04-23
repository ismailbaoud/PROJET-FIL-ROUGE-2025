<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    //index

    public function index()
    {
        $user = Auth::user();
        $reports = $user->reports()->latest()->get();
    
        return view('pages.hunter.reports', compact('reports'));
    }
    


    
    public function store(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'type' => 'required|in:SQL Injection,XSS,CSRF,RCE,Other',
        'target' => 'required|string|max:255',
        'steps' => 'required|string',
        'impact' => 'required|string',
        'poc' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime', 
        'severity' => 'required|in:Low,Medium,High,Critical',
    ]);

    $uploadPath = public_path('uploads/');

    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
    }

    $file = $request->file('poc');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move($uploadPath, $filename);

    $data = [
        'title' => $validated['title'],
        'type' => $validated['type'],
        'target' => $validated['target'],
        'steps' => $validated['steps'],
        'impact' => $validated['impact'],
        'severity' => $validated['severity'],
        'user_id' => Auth::id(),
        'program_id' => $id,
        'poc' => $filename,
    ];

    Report::create($data);

    return back()->with('success', 'Report created successfully!');
}




public function show($id)
{
    $report = Report::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail(); 

    return view('pages.hunter.reportDetails', compact('report'));
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

    public function showSubmitForm($id){
        return view('pages.hunter.submitReport' ,compact('id'));
    }
    
}
