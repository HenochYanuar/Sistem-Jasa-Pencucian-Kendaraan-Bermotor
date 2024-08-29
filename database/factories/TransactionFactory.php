<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'price' => $this->faker->randomElement([15000, 30000, 70000, 150000]),
            'date_transaction' => $this->faker->dateTimeThisYear,
            'id_customer' => Customer::factory(),
        ];
    }
}
