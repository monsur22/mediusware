<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Transection
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');

    // Deposit
    Route::get('/deposit-list', [DepositController::class, 'showDepositedTransactions'])->name('showDepositedTransactions');
    Route::get('/deposit', [DepositController::class, 'depositForm'])->name('depositForm');
    Route::post('/deposit', [DepositController::class, 'deposit'])->name('deposit');

    //Withdraw-lit
    Route::get('/withdraw-list', [WithdrawController::class, 'showwithdrawTransactions'])->name('showwithdrawTransactions');
    Route::get('/withdraw', [WithdrawController::class, 'withdrawForm'])->name('withdrawForm');
    Route::post('/withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');



});


require __DIR__.'/auth.php';
