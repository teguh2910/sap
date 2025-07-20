<?php

namespace Database\Factories;

use App\Models\GudangDua;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GudangDua>
 */
class GudangDuaFactory extends Factory
{
    protected $model = GudangDua::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'part_number' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'part_name' => $this->faker->words(3, true),
            'category_part' => $this->faker->randomElement(['FG', 'RM', 'WIP']),
            'uom' => $this->faker->randomElement(['PCS', 'KG', 'M', 'L']),
            'beginning_balance' => $this->faker->numberBetween(0, 1000),
            'incoming_balance' => $this->faker->numberBetween(0, 500),
            'usage_balance' => $this->faker->numberBetween(0, 300),
            'ending_balance' => $this->faker->numberBetween(0, 800),
        ];
    }
}
