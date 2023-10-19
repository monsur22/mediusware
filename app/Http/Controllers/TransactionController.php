<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $user = auth()->user();
    $transactions = $user->transactions;
    $currentBalance = $user->balance;
    return view('transection.transactionsAndBalance', compact('transactions', 'currentBalance'));

    }


   


}
