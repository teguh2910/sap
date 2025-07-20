<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_vendor' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nama_vendor' => $this->faker->company,
            'alamat_vendor' => $this->faker->address,
            'telp_vendor' => $this->faker->phoneNumber,
            'email_vendor' => $this->faker->unique()->safeEmail,
            'pic_vendor' => $this->faker->name,
        ];
    }
}
