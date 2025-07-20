<?php

namespace Database\Factories;

use App\Models\PartCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PartCustomer>
 */
class PartCustomerFactory extends Factory
{
    protected $model = PartCustomer::class;

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
            'harga_part_customer' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
