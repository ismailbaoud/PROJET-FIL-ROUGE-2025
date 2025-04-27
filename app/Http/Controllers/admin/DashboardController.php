<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeUsers = User::where('status', 'active')->get()->count();
        $totalReports = Report::get()->count();
        $totalPrograms = Program::get()->count();
        $totalPayounts = User::with('profile')->get()->sum(function ($user) {return $user->profile->rewards ?? 0;});
        $reports = Report::with('user')->latest()->take(2)->get();
        $programs = Program::latest()->take(2)->get();
        $hunters = User::where('role', 'hunter')->where('status','EnAttent')->latest()->take(2)->get();
        $entreprises = User::where('role', 'entreprise')->where('status','EnAttent')->latest()->take(2)->get();
        return view('pages/admin/admin', compact('reports', 'programs', 'hunters' , 'entreprises', 'activeUsers','totalReports', 'totalPrograms', 'totalPayounts'));
    }
}
