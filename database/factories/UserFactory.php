<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'position' => 'admin', // Default to admin for tests
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Create a user with admin position.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'position' => 'admin',
        ]);
    }

    /**
     * Create a user with manager position.
     */
    public function manager(): static
    {
        return $this->state(fn (array $attributes) => [
            'position' => 'manager',
        ]);
    }

    /**
     * Create a user with staff position.
     */
    public function staff(): static
    {
        return $this->state(fn (array $attributes) => [
            'position' => 'staff',
        ]);
    }
}
