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
            'no_po' => $this->faker->unique()->regexify('PO-SUPP-[0-9]{6}'),
            'id_vendor' => Vendor::factory(),
            'id_bank' => Bank::factory(),
            'tgl_po' => $this->faker->date(),
            'top' => $this->faker->numberBetween(7, 90),
        ];
    }
}
