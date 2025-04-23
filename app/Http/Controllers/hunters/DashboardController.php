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
        $hunter = Auth::user();
        
        $programs = Program::with('entreprise')
                            ->latest()
                            ->take(2)
                            ->where('status', '=' , 'panding')
                            ->get();
        
        

        $reports = Report::where('user_id', '=', $hunter->id)
                         ->latest()
                         ->take(2)
                         ->get()
                         ->map(function ($report) {
                             $report->time_diff = $report->created_at->diffForHumans();
                             return $report;
                         });
                            
                           
        return view('pages.hunter/hunter', compact('programs', 'reports'));
    }


}
