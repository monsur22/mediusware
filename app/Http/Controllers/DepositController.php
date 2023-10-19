<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\DepositService;

class DepositController extends Controller
{
    protected $depositService;
    protected $depositRepository;

    public function __construct(DepositService $depositService)
    {
        $this->depositService = $depositService;
    }
    /**
     * Show all the deposited transactions.
     */
    public function showDepositedTransactions()
    {

        $user = auth()->user(); // Get the currently authenticated user
        $depositedTransactions = $this->depositService->showDepositedTransactions($user);
        return view('transection.depositedTransactions', compact('depositedTransactions'));
    }

    public function depositForm()
    {
        $user = auth()->user();
        return view('transection.depositForm', compact('user'));
    }

    public function deposit(Request $request)
    {
        $user = auth()->user();
        $amount = $request->input('amount');

        // Call the deposit service to perform the deposit
        $this->depositService->deposit($user, $amount);

        // Redirect back or to a success page
        return redirect()->route('showDepositedTransactions')->with('success', 'Deposit successful.');
    }
}
