<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    /*
        Fungsi ini berfungsi untuk mengambil semua data pada table customers
        dengan menggunakan pagination dari library dataTables berdasarkan search
        yang memungkinkan untuk mencari data customer tertentu berdasarkan 
        kata kunci yang diinputkan pada input search, lalu mengirimkan data yang didapat
        ke directory view/customer/index.
    */
    public function index()
    {
        $customers = Customer::query()
            ->when(request('search'), function ($query) {
                $searchTerm = '%' . request('search') . '%';
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('tlpn', 'like', $searchTerm);
            })->paginate(10);
        return view('customer/index', [
            'customers' => $customers
        ]);
    }

    // Fungsi ini bertujuan untuk meredirect Endpoint ke halaman form tambah data dengan Customer baru
    public function addNew()
    {
        return view('customer/addNew');
    }

    /*
        Fungsi ini berguna untuk mengambil semua inputan pada form tambah data sebelumnya dan memvalidasi semua data yang ada
        lalu menyimpan masing-masing data ke field masing-masing di table yang sesuai, lalu meredirect Endpoint ke
        halaman detail transaction untuk dapat langsung melihat berapa biaya yang harus dibayarkan oleh customer
    */
    public function addNewPost(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required | max:255',
                'tlpn' => 'required | max:15 | unique:customers',
                'brand' => 'required | max:255',
                'model' => 'required | max:255',
                'vehicle_number_plate' => 'required | max:15',
                'price' => 'required'
            ]);

            $name = $request->name;
            $tlpn = $request->tlpn;
            $brand = $request->brand;
            $model = $request->model;
            $vehicle_number_plate = $request->vehicle_number_plate;
            $price = $request->price;
            $date_transaction = now();

            $customer = Customer::create([
                'name' => $name,
                'tlpn' => $tlpn,
            ]);

            $vehicle = Vehicle::create([
                'brand' => $brand,
                'model' => $model,
                'vehicle_number_plate' => $vehicle_number_plate,
                'id_customer' => $customer->id
            ]);

            $transaction = Transaction::create([
                'price' => $price,
                'date_transaction' => $date_transaction,
                'id_customer' => $customer->id
            ]);

            return redirect(route('transactions.detail', $transaction->id))->with('success', 'Transaksi berhasil ditambah ');
        } catch (\Throwable $th) {
            return redirect(route('customers.addNew'))->with('errors', 'Transaksi Gagal ditambah');
        }
    }

    // Fungsi ini bertujuan untuk meredirect Endpoint ke halaman form tambah data dengan Customer lama
    public function addExist()
    {
        $customers = Customer::all();
        return view('customer/addExist', [
            'customers' => $customers
        ]);
    }


    /*
        Fungsi ini berguna untuk mengambil semua inputan pada form tambah data sebelumnya dan memvalidasi semua data yang ada
        lalu menyimpan masing-masing data ke field masing-masing di table yang sesuai, lalu meredirect Endpoint ke
        halaman detail transaction untuk dapat langsung melihat berapa biaya yang harus dibayarkan oleh customer
    */
    public function addExistPost(Request $request)
    {
        try {
            $validate = $request->validate([
                'customer' => 'required',
                'brand' => 'required | max:255',
                'model' => 'required | max:255',
                'vehicle_number_plate' => 'required | max:15',
                'price' => 'required'
            ]);

            $customer = $request->customer;
            $brand = $request->brand;
            $model = $request->model;
            $vehicle_number_plate = $request->vehicle_number_plate;
            $price = $request->price;
            $date_transaction = now();

            $vehicle = Vehicle::create([
                'brand' => $brand,
                'model' => $model,
                'vehicle_number_plate' => $vehicle_number_plate,
                'id_customer' => $customer
            ]);

            // untuk mengetahui apakah customer berhak mendapatkan diskon gratis atau tidak 
            $customerCount = DB::table('transactions')
                ->where('id_customer', $customer)
                ->count();

            // jika customer sudah melakukan pencucian sebanyak 5 kali maka pencucian yang ke 6 gratis
            if ($customerCount % 5 == 0) {
                $price = "Diskon Gratis";
            }

            $transaction = Transaction::create([
                'price' => $price,
                'date_transaction' => $date_transaction,
                'id_customer' => $customer
            ]);

            return redirect(route('transactions.detail', $transaction->id))->with('success', 'Transaksi berhasil ditambah ');
        } catch (\Throwable $th) {
            return redirect(route('customers.addExist'))->with('errors', 'Transaksi Gagal ditambah');
        }
    }

    // Fungsi ini bertujuan untuk meredirect Endpoint ke halaman form edit data Customer dengan mengirimkan data old dari customer tersebut
    public function edit($customerId) {
        $customer = Customer::find($customerId);
        return view('customer.update', [
            'customer' => $customer
        ]);
    }


    /*
        Fungsi ini berguna untuk mengambil semua inputan pada form edit data sebelumnya dan memvalidasi semua data yang ada
        lalu menyimpan masing-masing data ke field masing-masing di table yang sesuai, lalu meredirect Endpoint ke
        halaman customer index untuk dapat langsung melihat perubahan data customer
    */
    public function update(Request $request)
    {
        try{

            $validate = $request->validate([
                'name' => 'required | max:255',
                'tlpn' => 'required | max:15'
            ]);
            
            $customerId = $request->id;
            $customer = Customer::findOrFail($customerId)->update([
                'name' => $request->name,
                'tlpn' => $request->tlpn,
            ]);
            return redirect(route('customers.index'))->with('success', 'Customer Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect(route('customers.edit'))->with('errors', 'Customer Gagal Diubah');
        }
    }


    /*
        Fungsi ini berguna untu mencari data customer tertentu berdasarkan id customer
        lalu menghapusnya dari database dan meredirect Endpoint ke halaman get All customers
    */
    public function delete($customerId) {
        $customer = $customerId;
        $customer = Customer::findOrFail($customer);
        $customer->delete();
        return redirect(route('customers.index'))->with('success', 'Customer Berhasil Dihapus');
    }
}
