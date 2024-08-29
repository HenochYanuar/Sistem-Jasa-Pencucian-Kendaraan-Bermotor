<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Endpoint dashboar
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Endpoint data customers

Route::get('/data/customers', [CustomerController::class, 'index'])->name('customers.index'); // API Get All
Route::get('/data/customers/addNewCustomer', [CustomerController::class, 'addNew'])->name('customers.addNew'); // API form tambah data dengan customer baru
Route::get('/data/customers/addExistCustomer', [CustomerController::class, 'addExist'])->name('customers.addExist'); // API form tambah data dengan customer lama
Route::post('/data/customers/new', [CustomerController::class, 'addNewPost'])->name('customers.addNewPost'); // API Insert dengan data customer baru
Route::post('/data/customers/exist', [CustomerController::class, 'addExistPost'])->name('customers.addExistPost'); // API Insert dengan data customer lama
Route::get('/data/customers/{customerId}', [CustomerController::class, 'edit'])->name('customers.edit'); // API form edit data customer
Route::put('/data/customers', [CustomerController::class, 'update'])->name('customers.update'); // API Update data customer
Route::delete('/data/customers/{customerId}', [CustomerController::class, 'delete'])->name('customers.delete'); // API Delete data customer


// Endpoint data transactions

Route::get('/data/transactions', [TransactionController::class, 'index'])->name('transactions.index'); // API Get All
Route::get('/data/transactions/{transactionId}', [TransactionController::class, 'detail'])->name('transactions.detail'); // API Get detail transaction
Route::delete('/data/transactions/{transactionId}', [TransactionController::class, 'delete'])->name('transactions.delete'); // API Delete transaction
