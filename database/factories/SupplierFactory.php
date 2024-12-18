<?php

// database/factories/SupplierFactory.php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition()
    {
        return [
            'id' => '100' . $this->faker->unique()->numerify('#######'), 
            'name' => $this->faker->company,
            'city_id' => $this->faker->randomElement(['AZU-01', 'GAL-04', 'CAR-05','CAR-05','IMB-01','LOR-01']),
            'supplier_type' => $this->faker->boolean,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->boolean,
        ];
    }
}
