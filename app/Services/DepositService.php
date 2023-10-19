<?php

namespace App\Services;

use App\Models\User;
use App\Models\Transaction;
use App\Repositories\DepositRepository;

class DepositService
{
    protected $depositRepository;

    public function __construct(DepositRepository $depositRepository)
    {
        $this->depositRepository = $depositRepository;
    }
    public function showDepositedTransactions($user){
        return  $this->depositRepository->showDepositedTransactions($user);
    }
    public function deposit(User $user, $amount)
    {
        // Update user's balance
        $user->balance += $amount;
        $user->save();

        // Create a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transaction_type = 'Deposit';
        $transaction->amount = $amount;

        // Save the deposit transaction using the repository
        $this->depositRepository->saveTransaction($transaction);
    }
}
