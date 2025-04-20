<?php

namespace App\Http\Controllers\entreprises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //index
    public function index()
    {
        $entreprise = Auth::user();
    
        $programs = Program::where('user_id', $entreprise->id)
                           ->latest()
                           ->take(3)
                           ->get();
    
        $programIds = $programs->pluck('id');
    
        $reports = Report::whereIn('program_id', $programIds)
                         ->latest()
                         ->take(4)
                         ->get();
        
        return view('pages.entreprise/entreprise', compact('programs', 'reports'));
    }
    
    


}
