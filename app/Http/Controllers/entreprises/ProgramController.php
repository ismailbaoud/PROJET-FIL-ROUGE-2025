<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\User;
use App\Http\Controllers\Controller;

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

        return view('pages.entreprise/programs', compact('programs'));
    }
    


    //create
    public function create(Request $request){
        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'min_reward' => $request->min_reward,
            'max_reward' => $request->max_reward,
            'user_id' => Auth::id()
        ]);
        return back()->with('success', 'Program created successfully!');
    }


    //update
    public function update(Request $request, $id){
        $program = Program::findOrFail($id);
        $program->update([
            'title' => $request->title,
            'description' => $request->description,
            'min_reward' => $request->min_reward,
            'max_reward' => $request->max_reward,
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Program updated successfully!');
    }


    //change status
    public function changeStatus($id){
        $program = Program::findOrFail($id);

        switch ($program->status) {
            case 'en_attnte':
                $program->status = 'actif';
                break;
            case 'actif':
                $program->status = 'archive';
                break;
            case 'archive':
                $program->status = 'en_attnte';
                break;
        }

        $program->save();

        return back()->with('success', 'Program status changed successfully!');
    }


    //delete
    public function delete($id){
        $program = Program::findOrFail($id);
        $program->status = 'rejete';
        $program->save();
    
        return back()->with('success', 'Program rejected successfully!');
    }
    

    //addMember
    public function addMember(Request $request, $programId){
        $program = Program::findOrFail($programId);
        $user = User::findOrFail($request->user_id);

        $program->members()->syncWithoutDetaching([$user->id]);

        return back()->with('success', 'Member added to program successfully!');
    }

    
}
