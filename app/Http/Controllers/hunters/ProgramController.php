<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProgramController extends Controller
{


    //index
    public function index(Request $request){
        $query = Program::query();

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        switch ($request->sort) {
            case 'highest_bounty':
                $query->orderByDesc('max_reward');
                break;
            case 'most_reports':
                $query->orderByDesc('reports_count');
                break;
            case 'recently_updated':
                $query->orderByDesc('updated_at');
                break;
            default:
                $query->orderByDesc('created_at');
                break;
        }

        $programs = $query->paginate(6);

        return view('pages.hunter/programs', compact('programs'));
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
    $program = Program::findOrFail($id);

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
