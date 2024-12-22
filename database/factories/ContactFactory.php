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
        $avatar = [
            "avatar_io.png",
            "avatar_1.png",
            "avatar_2.png",
            "avatar_3.png",
            "avatar_4.png",
            "avatar_5.png",
            "avatar_6.png",
            "avatar_7.png",
            "avatar_8.png",
        ];
        return [
            'user_id' => User::inRandomOrder()->first(),
            'name' => fake()->name(),
            'avatar' => fake()->randomElement($avatar),
            'phone_number' => fake()->phoneNumber(),
            'biography' => fake()->text(),
            'visible' => true,
        ];
    }
}