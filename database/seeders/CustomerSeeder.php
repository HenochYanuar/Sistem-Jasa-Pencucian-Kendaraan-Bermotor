<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Transaction;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = Customer::factory()->count(5)->create();

        foreach ($customers as $customer) {
            $vehicles = Vehicle::factory()->count(2)->create([
                'id_customer' => $customer->id,
            ]);

            $transactions = Transaction::factory()->count(3)->create([
                'id_customer' => $customer->id,
                'date_transaction' => now(),
            ]);
        }
    }
}
