<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    /*
        Fungsi ini berfungsi untuk mengambil semua data pada table transactions
        dengan menggunakan pagination dari library dataTables berdasarkan search
        yang memungkinkan untuk mencari data transaction berdasarkan kata kunci yang sama dengan
        field date_transaction, price, dan name padatable customers yang diinputkan 
        pada input search, lalu mengirimkan data yang didapat ke directory halaman get all data transaction.
    */
    public function index()
    {
        $transactions = Transaction::query()
            ->with(['customer'])
            ->when(request('search'), function ($query) {
                $searchTerm = '%' . request('search') . '%';
                $query->where('date_transaction', 'like', $searchTerm)
                    ->orWhere('price', 'like', $searchTerm)
                    ->orWhereHas('customer', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            })->paginate(10);
        return view('transaction/index', [
            'transactions' => $transactions
        ]);
    }

    /*  
        fungsi ini berguna untuk menampilkan detail dari data pada table transaction dan customer
        berdasarkan id transaction yang dipilih
    */
    public function detail($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $customer = Customer::find($transaction->id_customer);
        return view('transaction.detail', [
            'transaction' => $transaction,
            'customer' => $customer
        ]);
    }


    /*
        Fungsi ini berguna untu mencari data transaction tertentu berdasarkan id transactiom
        lalu menghapusnya dari database dan meredirect Endpoint ke halaman get All transactions
    */
    public function delete($transactionId) {
        $transaction = $transactionId;
        $transaction = Transaction::findOrFail($transaction);
        $transaction->delete();
        return redirect(route('transaction.index'))->with('success', 'Transaksi Berhasil Dihapus');
    }
}
