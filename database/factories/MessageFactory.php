<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['sent', 'received'];

        return [
            'contact_id' => Contact::inRandomOrder()->first(),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
            'message' => fake()->text(),
            'status' => fake()->randomElement($status),
        ];
    }
}