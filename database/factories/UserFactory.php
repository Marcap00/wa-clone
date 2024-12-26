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
        $avatarPlaceholders = [
            "https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/1212984/pexels-photo-1212984.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/1121796/pexels-photo-1121796.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/1090387/pexels-photo-1090387.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/842548/pexels-photo-842548.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/927022/pexels-photo-927022.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/227294/pexels-photo-227294.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/211050/pexels-photo-211050.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        ];
        $userNames = [
            "Alexander Thompson",
            "Benjamin Walker",
            "Charlotte Hughes",
            "Daniel Mitchell",
            "Elizabeth Parker",
            "Frederick Collins",
            "Grace Anderson",
            "Henry Wilson",
            "Isabella Foster",
            "James Bennett",
            "Katherine Stewart",
            "Lawrence Richardson",
            "Margaret Campbell",
            "Nathan Harrison",
            "Oliver Brooks",
            "Penelope Wright",
            "Quinn Fletcher",
            "Rebecca Morrison",
            "Samuel Cooper",
            "Thomas Baldwin"
        ];
        $randomName = fake()->randomElement($userNames);
        return [
            'name' => $randomName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            /* 'password' => static::$password ??= Hash::make('password'), */
            'password' => "user",
            'remember_token' => Str::random(10),
            'phone_number' => fake()->phoneNumber(),
            'avatar' => null,
            'avatar_placeholder' => fake()->randomElement($avatarPlaceholders),
            'biography' => fake()->text(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
