<?php

namespace Database\Factories;

use App\Models\Cashflow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cashflow>
 */
class CashflowFactory extends Factory
{
    protected $model = Cashflow::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank' => $this->faker->company . ' Bank',
            'beginning_balance' => $this->faker->numberBetween(1000000, 10000000),
            'incoming_balance' => $this->faker->numberBetween(0, 5000000),
            'out_balance' => $this->faker->numberBetween(0, 3000000),
            'ending_balance' => $this->faker->numberBetween(1000000, 12000000),
        ];
    }
}
