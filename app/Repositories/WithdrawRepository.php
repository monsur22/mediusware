<?php

namespace App\Repositories;

use App\Models\Transaction;

class WithdrawRepository
{
    public function showwithdrawTransactions($user)
    {
        return Transaction::where('transaction_type', 'Withdraw')->where('user_id', $user->id)->get();
    }

    public function getTotalWithdrawalThisMonth($user, $netWithdrawal)
    {
        return Transaction::where('user_id', $user->id)
            ->whereMonth('date', now()->month)
            ->where('transaction_type', 'Withdraw')
            ->sum('amount') + $netWithdrawal;
    }

    public function getTotalWithdrawal($user)
    {
        return Transaction::where('user_id', $user->id)
            ->where('transaction_type', 'Withdraw')
            ->sum('amount');
    }

    public function createWithdrawalTransaction($user, $amount, $withdrawalFee)
    {
        Transaction::create([
            'user_id' => $user->id,
            'transaction_type' => 'Withdraw',
            'amount' => $amount,
            'fee' => $withdrawalFee,
            'date' => now(),
        ]);
    }
}
