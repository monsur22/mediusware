<?php

namespace App\Services;

use App\Models\User;
use App\Models\Transaction;
use App\Repositories\WithdrawRepository;
use Carbon\Carbon;

class WithdrawService
{
    protected $withdrawRepository;

    public function __construct(WithdrawRepository $withdrawRepository)
    {
        $this->withdrawRepository = $withdrawRepository;
    }
    public function showwithdrawTransactions($user)
    {
        return $this->withdrawRepository->showwithdrawTransactions($user);
    }

    public function withdraw($user, $amount)
    {
        $withdrawalRate = ($user->account_type === 'Individual') ? 0.015 : 0.025;
        $withdrawalFee = 0;
        $netWithdrawal = $amount;

        // Check if it's Friday
        if (Carbon::now()->dayOfWeek === Carbon::FRIDAY) {
            $withdrawalFee = 0;
        }

        if ($user->account_type === 'Individual') {
            // Calculate the fee if the amount exceeds 1000
            if ($amount > 1000) {
                $withdrawalFee = ($amount - 1000) * $withdrawalRate;
                $netWithdrawal = $amount - $withdrawalFee;
            }
        }

        $totalWithdrawalThisMonth = $this->withdrawRepository->getTotalWithdrawalThisMonth($user, $netWithdrawal);

        if ($user->account_type === 'Individual' && $totalWithdrawalThisMonth + $netWithdrawal <= 5000) {
            $netWithdrawal += $withdrawalFee;
            $withdrawalFee = 0;
        }

        if ($user->account_type === 'Business') {
            $totalWithdrawal = $this->withdrawRepository->getTotalWithdrawal($user);

            if ($totalWithdrawal + $amount > 50000) {
                $withdrawalRate = 0.015;
            }

            $withdrawalFee = $amount * $withdrawalRate;
            $netWithdrawal = $amount - $withdrawalFee;
        }

        // Deduct the withdrawal fee from the balance
        $user->balance -= $netWithdrawal;
        $user->save();

        // Create a withdrawal transaction record
        $this->withdrawRepository->createWithdrawalTransaction($user, $amount, $withdrawalFee);

        return $netWithdrawal;
    }
}
