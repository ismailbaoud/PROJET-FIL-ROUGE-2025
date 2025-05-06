<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        try {
            $programs = Program::with('users')
            ->leftJoin('reports', 'programs.id', '=', 'reports.program_id')
            ->select('programs.*')
            ->selectRaw('COALESCE(SUM(reports.reward), 0) as total_rewards')
            ->when($request->filled('status'), fn($q) => $q->where('programs.status', $request->status))
            ->groupBy('programs.id')
            ->orderByDesc('programs.created_at')
            ->paginate(6)
            ->withQueryString();        

            return view('pages.admin.programs', compact('programs'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load programs: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:active,inactive',
        ]);

        try {
            $program = Program::findOrFail($id);
            $program->update(['status' => $request->status]);

            Alert::toast('Program status updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update program status: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function destroy(Program $program)
    {
        try {
            $program->delete();
            Alert::toast('Program deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete program: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}