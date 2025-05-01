<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProgramController extends Controller
{


    //index
    public function index(Request $request)
    {
        $programs = Program::query();
    
        if ($request->filled('status')) {
            $programs = $programs->where('status', $request->status);
        }
    
        if ($request->filled('sort')) {
            if ($request->sort === 'highest_bounty') {
                $programs = $programs->orderBy('max_reward', 'desc');
            } elseif ($request->sort === 'most_reports') {
                $programs = $programs->orderBy('reports_count', 'desc');
            } elseif ($request->sort === 'recently_updated') {
                $programs = $programs->orderBy('updated_at', 'desc');
            } else {
                $programs = $programs->orderBy('created_at', 'desc');
            }
        } else {
            $programs = $programs->orderBy('created_at', 'desc');
        }
    
        $programs = $programs->paginate(6);
    
        return view('pages.hunter.programs', compact('programs'));
    }
    


    //show
    public function show($id){
        $program = Program::findOrFail($id);
    
        $user = Auth::user();
    
        $isJoined = $user->joinedPrograms()->where('program_id', $program->id)->exists();
    
        $entreprise = $program->entreprise;
    
        $inScope = $program->scopes()->where('type', 'in')->get();
        $outOfScope = $program->scopes()->where('type', 'out')->get();
    
        return view('pages.hunter.programDetails', compact(
            'program', 'entreprise', 'isJoined', 'inScope', 'outOfScope', 'user'
        ));
    }
    

    //join program
    public function joinProgram($id){
    $user = Auth::user(); 
    $program = Program::find($id);

    if (!$user->joinedPrograms->contains($program->id)) {
        $user->joinedPrograms()->attach($program->id);
    }

    return redirect()->back()->with('success', 'You have joined the program successfully!');
    }


    //joind programs
    public function joinedPrograms(){
        $user = Auth::user();
        $programs = $user->joinedPrograms()->with('entreprise')->paginate(6);
    
        return view('pages.hunter.myPrograms', compact('programs'));
    }


}
