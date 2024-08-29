<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'vehicle_number_plate' => $this->faker->unique()->regexify('[A-Z]{1,2} [0-9]{1,4} [A-Z]{1,3}'),
            'id_customer' => Customer::factory(),
        ];
    }
}
