<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use App\Models\Scope;
use App\Models\Program;
use App\Http\Controllers\Controller;

class ScopeController extends Controller
{

    //create
    public function create(Program $program){
        return view('scopes.create', compact('program'));
    }


    //store
    public function store(Request $request, $programId){
        $request->validate([
            'target' => 'required|string',
            'target_type' => 'required|in:web,mobile,api,other',
            'type' => 'required|in:in,out',
            'instructions' => 'nullable|string',
        ]);
    
        $program = Program::findOrFail($programId);
    

        $scope = new Scope();
        $scope->target = $request->input('target');
        $scope->target_type = $request->input('target_type');
        $scope->type = $request->input('type');
        $scope->instructions = $request->input('instructions');
        $scope->program_id = $program->id;
        $scope->save();
    
        return back()->with('success', 'Scope added successfully!');
    }
    
    
    // edit form
    public function edit(Scope $scope){
        $program = $scope->program; // Get the related program
        return view('scopes.edit', compact('scope', 'program'));
    }


    // Update
    public function update(Request $request, Scope $scope){
        $request->validate([
            'target' => 'required|string',
            'type' => 'required|in:in,out',
            'instructions' => 'required|string',
        ]);

        $scope->update([
            'target' => $request->target,
            'type' => $request->type,
            'instructions' => $request->instructions,
        ]);

        return redirect()->route('programs.show', $scope->program_id)->with('success', 'Scope updated successfully.');
    }


    // delete
    public function destroy(Scope $scope){
        $programId = $scope->program_id;
        $scope->delete();

        return back()->with('success', 'Scope deleted successfully.');
    }

    
}
