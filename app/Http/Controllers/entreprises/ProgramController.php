<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
   public function index(Request $request)
{
    // Initialize query builder for the Program model
    $query = Program::query();

    // Apply status filter if exists
    if ($request->has('status') && in_array($request->status, ['accepte', 'rejete', 'en_attente'])) {
        $query->where('status', $request->status);
    }

    // Apply sorting
    switch ($request->sort) {
        case 'highest_bounty':
            $query->orderBy('max_reward', 'desc');
            break;
        case 'recently_updated':
            $query->orderBy('updated_at', 'desc');
            break;
        case 'newest':
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }

    // Get paginated programs
    $programs = $query->paginate(6);

    // Return view with the filtered programs
    return view('pages.entreprise.programs', compact('programs'));
}


    public function create(Request $request)
    {
        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'min_reward' => $request->min_reward,
            'max_reward' => $request->max_reward,
            'status' => 'en_attnte',
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Program created successfully!');
    }

    public function update(Request $request, $id)
    {
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

    public function changeStatus($id)
    {
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

    public function delete($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 'rejete';
        $program->save();
    
        return back()->with('success', 'Program rejected successfully!');
    }
    

    public function addMember(Request $request, $programId)
    {
        $program = Program::findOrFail($programId);
        $user = User::findOrFail($request->user_id);

        $program->members()->syncWithoutDetaching([$user->id]);

        return back()->with('success', 'Member added to program successfully!');
    }
}
