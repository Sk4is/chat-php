<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::class,
            'chat_id' => Chat::class,
            'type' => fake()->random(['moderator', 'member']),
            'role' => fake()->text(),
            'entry_date' => now()
        ];
    }
}
