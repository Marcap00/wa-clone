<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'name' => fake()->name(),
            'avatar' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
            'phone_number' => fake()->phoneNumber(),
            'biography' => fake()->text(),
            'visible' => true,
        ];
    }
}