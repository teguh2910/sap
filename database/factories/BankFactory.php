<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_bank' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nama_bank' => $this->faker->company . ' Bank',
            'alamat_bank' => $this->faker->address,
            'no_rek_bank' => $this->faker->bankAccountNumber,
            'currency_bank' => $this->faker->randomElement(['IDR', 'USD', 'EUR', 'SGD']),
        ];
    }
}
