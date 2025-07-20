<?php

namespace Database\Factories;

use App\Models\PoCustomer;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoCustomer>
 */
class PoCustomerFactory extends Factory
{
    protected $model = PoCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_po_customer' => $this->faker->unique()->regexify('PO-CUST-[0-9]{6}'),
            'id_customer' => $this->faker->numberBetween(1, 10),
            'id_produk' => $this->faker->numberBetween(1, 10),
            'qty_po_customer' => $this->faker->numberBetween(1, 100),
            'harga_po_customer' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
