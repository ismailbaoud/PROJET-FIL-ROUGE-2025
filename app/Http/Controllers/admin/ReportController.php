<?php

namespace App\Http\Controllers\admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('program')->get();
        return view('pages.admin/reports', compact('reports'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return back();
    }
}
