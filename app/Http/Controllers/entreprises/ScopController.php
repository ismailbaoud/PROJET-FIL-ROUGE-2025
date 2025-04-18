<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scope;
use App\Models\Program;

class ScopeController extends Controller
{
    // إنشاء Scope جديد
    public function createScope(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'type' => 'required|string|max:50',
            'description' => 'required|string',
            'program_id' => 'required|exists:programs,id',
        ]);

        Scope::create([
            'url' => $request->url,
            'type' => $request->type,
            'description' => $request->description,
            'program_id' => $request->program_id,
        ]);

        return back()->with('success', 'Scope created successfully!');
    }

    // تحديث Scope
    public function updateScope(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|url',
            'type' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        $scope = Scope::findOrFail($id);
        $scope->update([
            'url' => $request->url,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Scope updated successfully!');
    }

    // حذف Scope
    public function destroy($id)
    {
        $scope = Scope::findOrFail($id);
        $scope->delete();

        return back()->with('success', 'Scope deleted successfully!');
    }
}
