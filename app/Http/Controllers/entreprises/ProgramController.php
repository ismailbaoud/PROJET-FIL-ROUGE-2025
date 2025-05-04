<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Http\Controllers\Controller;
use App\Http\Requests\entreprise\ProgramRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    // Display list of programs
    public function index(Request $request)
    {
        $validStatuses = ['active', 'inactive'];
        $validSorts = [
            'newest' => 'created_at',
            'highest_bounty' => 'max_reward',
        ];

        $query = Program::where('user_id', Auth::id())->withCount('reports');

        if ($request->has('status') && in_array($request->status, $validStatuses)) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        $sort = $validSorts[$request->input('sort', 'newest')] ?? 'created_at';
        $query->orderByDesc($sort);

        $programs = $query->paginate(6)->appends($request->only(['status', 'sort', 'search']));

        return view('pages.entreprise.programs', compact('programs'));
    }

    // Store new program
    public function create(ProgramRequest $request)
    {
        try {
            Program::create([
                'title' => $request->title,
                'description' => $request->description,
                'min_reward' => $request->min_reward,
                'max_reward' => $request->max_reward,
                'user_id' => Auth::id(),
                'status' => 'inactive', // default
            ]);

            Alert::toast('Program created successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to create program', 'error');
        }

        return back();
    }

    // Update existing program
    public function update(ProgramRequest $request, $id)
    {
        try {
            $program = Program::findOrFail($id);

            $program->update([
                'title' => $request->title,
                'description' => $request->description,
                'min_reward' => $request->min_reward,
                'max_reward' => $request->max_reward,
            ]);

            Alert::toast('Program updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update program', 'error');
        }

        return back();
    }

    // Toggle status between active and inactive
    public function changeStatus($id)
    {
        try {
            $program = Program::findOrFail($id);

            $program->status = $program->status === 'active' ? 'inactive' : 'active';
            $program->save();

            Alert::toast('Program status updated!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update status', 'error');
        }

        return back();
    }

    // Delete program
    public function delete($id)
    {
        try {
            $program = Program::findOrFail($id);
            $program->delete();

            Alert::toast('Program deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete program', 'error');
        }

        return back();
    }
}
