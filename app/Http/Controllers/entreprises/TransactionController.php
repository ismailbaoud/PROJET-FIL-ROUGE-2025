<?php

namespace App\Http\Controllers\entreprises;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $transactions = Transaction::with(['toUser', 'fromUser', 'report', 'program'])
                ->where('from_user_id', Auth::id())
                ->when($request->filled('method'), fn($q) => $q->where('method', $request->method))
                ->when($request->filled('program_id'), fn($q) => $q->where('program_id', $request->program_id))
                ->paginate(6)
                ->withQueryString();

            return view('pages.entreprise.transactions', compact('transactions'));
        } catch (\Exception $e) {
            Alert::toast('Failed to load transactions: ' . $e->getMessage(), 'error');
            return back();
        }
    }
}