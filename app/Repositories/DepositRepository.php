<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Transaction;

class DepositRepository
{
    public function showDepositedTransactions($user){
        return Transaction::where('transaction_type', 'Deposit')->where('user_id', $user->id)->get();

    }
    public function saveTransaction(Transaction $transaction)
    {
        // Save the deposit transaction to the database
        return $transaction->save();
    }
}
