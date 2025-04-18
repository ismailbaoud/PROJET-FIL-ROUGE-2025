<?php

namespace App\Http\Controllers\entreprises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        return view('pages.entreprise/entreprise');
    }
}
