<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class ProgramController extends Controller{

    public function index(){
        $programs = Program::all();

        return view('pages/entreprise/programs')->with('programs',$programs);
    }


    public function create(Request $request){
        Program::create(['title' => $request->title,
                            'description' => $request->description,
                            'min_reward' => $request->min_reward,
                            'max_reward' => $request->max_reward,
                            'user_id' => Auth::id()
                        ]);
        return back();
    }    
}
