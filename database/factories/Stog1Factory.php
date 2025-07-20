<?php

namespace Database\Factories;

use App\Models\Stog1;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stog1>
 */
class Stog1Factory extends Factory
{
    protected $model = Stog1::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'part_no' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'qty_sto' => $this->faker->numberBetween(1, 1000),
            'tgl_sto' => $this->faker->date(),
        ];
    }
}
