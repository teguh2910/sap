<?php

namespace Database\Factories;

use App\Models\Truk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truk>
 */
class TrukFactory extends Factory
{
    protected $model = Truk::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_truk' => $this->faker->unique()->regexify('TRK[0-9]{3}'),
            'plat_no' => $this->faker->regexify('[A-Z] [0-9]{4} [A-Z]{3}'),
            'driver' => $this->faker->name(),
        ];
    }
}
