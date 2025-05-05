<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'status' => 'nullable|string|in:accepte,pending,rejected',
            'sort' => 'nullable|string|in:highest_bounty,most_reports,recently_updated,created_at',
        ]);

        try {
            $programs = Program::with('entreprise')
    ->withCount('reports')
    ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
    ->when($request->filled('sort'), function ($q) use ($request) {
        if ($request->sort === 'highest_bounty') {
            $q->orderByDesc('max_reward');
        } elseif ($request->sort === 'most_reports') {
            $q->orderByDesc('reports_count'); 
        } elseif ($request->sort === 'recently_updated') {
            $q->orderByDesc('updated_at');
        } else {
            $q->orderByDesc('created_at');
        }
    }, fn($q) => $q->orderByDesc('created_at'))
    ->paginate(6)
    ->withQueryString();


            return view('pages.hunter.programs-index', compact('programs'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load programs: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function show($id)
    {
        try {
            $program = Program::with(['entreprise', 'scopes'])->findOrFail($id);
            $entreprise = $program->entreprise;
            $user = Auth::user();
            $isJoined = $user->joinedPrograms()->where('program_id', $program->id)->exists();
            $inScope = $program->scopes()->where('type', 'in')->get();
            $outOfScope = $program->scopes()->where('type', 'out')->get();

            return view('pages.hunter.program-details', compact('program', 'entreprise', 'isJoined', 'inScope', 'outOfScope', 'user'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load program: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function joinProgram($id)
    {
        try {
            $user = Auth::user();
            $program = Program::findOrFail($id);

            if (!$user->joinedPrograms()->where('program_id', $program->id)->exists()) {
                $user->joinedPrograms()->attach($program->id);
                Alert::toast('You have joined the program successfully!', 'success');
            } else {
                Alert::toast('You are already joined to this program', 'info');
            }
        } catch (\Exception $e) {
            Alert::toast('Failed to join program: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function joinedPrograms(Request $request)
    {
        try {
            $user = Auth::user();
            $programs = $user->joinedPrograms()
                ->with('entreprise')
                ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
                ->paginate(6)
                ->withQueryString();

            return view('pages.hunter.programs-my', compact('programs'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load joined programs: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}