<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{

    //index
    public function index(){
        
        $programs = Program::with('entreprise')
                            ->latest()
                            ->take(2)
                            ->where('status', '=' , 'accepte')
                            ->get();
        
        

        $reports = Report::where('user_id', '=', Auth::user()->id)
                         ->latest()
                         ->take(2)
                         ->get()
                         ->map(function ($report) {
                             $report->time_diff = $report->created_at->diffForHumans();
                             return $report;
                         });
                            
        $totalReports = Report::get()->count();
        $validatedReports = Program::where('status','resolved')->get()->count();    
        return view('pages.hunter/hunter', compact('programs', 'reports', 'totalReports', 'validatedReports'));
    }


}
