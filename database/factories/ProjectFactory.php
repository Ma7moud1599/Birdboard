<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(4),
            'notes' => 'Foobar notes',
            'owner_id' => factory(App\Models\User::class)
        ];
    }
}
