<?php

namespace Database\Factories;

use App\Models\OutCash;
use App\Models\Bank;
use App\Models\PoSupplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutCash>
 */
class OutCashFactory extends Factory
{
    protected $model = OutCash::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_bank' => Bank::factory(),
            'id_po' => PoSupplier::factory(),
            'amount_out' => $this->faker->numberBetween(50000, 5000000),
            'category' => $this->faker->randomElement(['payment', 'operational', 'maintenance']),
            'tgl_out_cash' => $this->faker->date(),
        ];
    }
}
