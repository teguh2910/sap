<?php

namespace Database\Factories;

use App\Models\IncomingCash;
use App\Models\Bank;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncomingCash>
 */
class IncomingCashFactory extends Factory
{
    protected $model = IncomingCash::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_bank' => Bank::factory(),
            'id_customer' => Customer::factory(),
            'amount_incoming' => $this->faker->numberBetween(100000, 10000000),
            'po_customer' => $this->faker->regexify('PO-[0-9]{6}'),
            'tgl_incoming_cash' => $this->faker->date(),
            'top' => $this->faker->randomElement(['7 days', '14 days', '30 days', '45 days', '60 days']),
        ];
    }
}
