<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
        $role = $this->faker->randomElement(['Super Admin', 'Admin', 'Guru', 'Siswa']);
        $password = match ($role) {
            'Super Admin' => 'superadmin',
            'Admin' => 'admin',
            'Guru' => 'guru',
            'Siswa' => 'siswa',
            default => 'password',
        };
        $name = $this->faker->name();

        return [
            'name' => $name,
            'email' => strtolower(str_replace(' ', '_', $name)) . '@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
            'role' => $role,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
