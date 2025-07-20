<?php

namespace Database\Factories;

use App\Models\Sop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sop>
 */
class SopFactory extends Factory
{
    protected $model = Sop::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_sop' => $this->faker->sentence(3),
            'file_sop' => $this->faker->word() . '.pdf',
        ];
    }
}
