<?php

namespace App\Http\Controllers\hunters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{

    public function index()
    {

        return view('pages.hunter/hunter');
    }
}
