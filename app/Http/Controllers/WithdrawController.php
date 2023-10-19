<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\WithdrawService;
class WithdrawController extends Controller
{
    protected $withdrawService;

    public function __construct(WithdrawService $withdrawService)
    {
        $this->withdrawService = $withdrawService;
    }
    public function showwithdrawTransactions()
    {
        $user = auth()->user();
        $withdrawTransactions = $this->withdrawService->showwithdrawTransactions($user);
        return view('transection.withdrawTransactions', compact('withdrawTransactions'));
    }

    public function withdrawForm()
    {
        $user = auth()->user();
        return view('transection.withdrawForm', compact('user'));
    }

    public function withdraw(Request $request)
    {
        $user = auth()->user();
        $amount = $request->input('amount');

        // Call the withdraw service to perform the withdrawal
        $this->withdrawService->withdraw($user, $amount);

        return redirect()->route('showwithdrawTransactions')->with('success', 'Withdrawal successful.');
    }
}
