<?php

namespace Database\Factories;

use App\Models\PoSupplier;
use App\Models\Vendor;
use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoSupplier>
 */
class PoSupplierFactory extends Factory
{
    protected $model = PoSupplier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_vendor' => Vendor::factory(),
            'tgl_po' => $this->faker->date(),
            'top' => $this->faker->randomElement(['7 days', '14 days', '30 days', '45 days', '60 days']),
            'qty_po' => $this->faker->numberBetween(1, 1000),
            'delivery_by' => $this->faker->randomElement(['Truck', 'Ship', 'Air', 'Rail']),
            'delivery_date' => $this->faker->dateTimeBetween('+1 week', '+2 months')->format('Y-m-d'),
            'quot_no' => $this->faker->unique()->regexify('Q[0-9]{4}'),
            'pr_no' => $this->faker->unique()->regexify('PR[0-9]{4}'),
            'vat' => $this->faker->numberBetween(0, 15),
            'note_po' => $this->faker->optional()->sentence(),
        ];
    }
}
