<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Scope;
use App\Models\Program;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ScopeController extends Controller
{
    public function create(Program $program)
    {
        return view('pages.entreprise.scopes.create', compact('program'));
    }

    public function store(Request $request, Program $program)
    {
        $request->validate([
            'target' => 'required|string',
            'target_type' => 'required|string',
            'type' => 'required|string|in:in,out',
            'instructions' => 'required|string',
        ]);

        try {
            Scope::create([
                'target' => $request->target,
                'target_type' => $request->target_type,
                'type' => $request->type,
                'instructions' => $request->instructions,
                'program_id' => $program->id,
            ]);

            Alert::toast('Scope added successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to add scope: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function edit(Scope $scope)
    {
        $scope = Scope::with('program')->findOrFail($scope->id);
        $program = $scope->program;

        return view('pages.entreprise.scopes.edit', compact('scope', 'program'));
    }

    public function update(Request $request, Scope $scope)
    {
        $request->validate([
            'target' => 'required|string',
            'target_type' => 'required|string',
            'type' => 'required|string|in:in,out',
            'instructions' => 'required|string',
        ]);

        try {
            $scope->update([
                'target' => $request->target,
                'target_type' => $request->target_type,
                'type' => $request->type,
                'instructions' => $request->instructions,
            ]);

            Alert::toast('Scope updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update scope: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function destroy(Scope $scope)
    {
        try {
            $scope->delete();
            Alert::toast('Scope deleted successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete scope: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}