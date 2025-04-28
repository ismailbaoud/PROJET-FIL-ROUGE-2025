<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('users')->withSum('reports as total_rewards', 'reward')->orderBy('created_at','desc')->get();
        
        return view('pages.admin/programs', compact('programs'));
    }


    public function changeStatus(Request $request, $id){

        $program = Program::find($id);
        $program->update(['status'=>$request->status]);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::find($id)->delete();

        return back();
    }
}
