<?php

namespace App\Http\Controllers\hunters;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Controllers\Controller;


class ProgramController extends Controller
{
    // Display all programs with optional filters and sorting
    public function index(Request $request)
    {
        $query = Program::query();

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Sort
        switch ($request->sort) {
            case 'highest_bounty':
                $query->orderByDesc('max_reward');
                break;
            case 'most_reports':
                $query->orderByDesc('reports_count'); // Make sure to include this field or join reports table
                break;
            case 'recently_updated':
                $query->orderByDesc('updated_at');
                break;
            default:
                $query->orderByDesc('created_at'); // newest by default
                break;
        }

        $programs = $query->paginate(6);

        return view('pages.hunter/programs', compact('programs'));
    }

    // Show a single program
    // public function show($id)
    // {
    //     $program = Program::findOrFail($id);

    //     return view('pages.hunter/programs', compact('program'));
    // }
}
