<?php

namespace App\Http\Controllers\entreprises;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['toUser', 'fromUser', 'report', 'program'])->where('from_user_id', Auth::Id())->get();
        return view('pages.entreprise/transactions', compact('transactions'));
    }

}
