<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $transactions = Transaction::with(['toUser', 'fromUser', 'report', 'program'])
                ->when($request->filled('method'), fn($q) => $q->where('method', $request->method))
                ->when($request->filled('program_id'), fn($q) => $q->where('program_id', $request->program_id))
                ->orderByDesc('created_at')
                ->paginate(6)
                ->withQueryString();

            return view('pages.admin.transactions.index', compact('transactions'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load transactions: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}