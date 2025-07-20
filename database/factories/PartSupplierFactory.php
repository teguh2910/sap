<?php

namespace Database\Factories;

use App\Models\PartSupplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PartSupplier>
 */
class PartSupplierFactory extends Factory
{
    protected $model = PartSupplier::class;

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
        ];
    }
}
