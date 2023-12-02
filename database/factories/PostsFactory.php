<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'posts' => $this->faker->sentence(mt_rand(3,50)),
            'image' => $this->faker->sentence(mt_rand(1,2)),
            'users_id'  => mt_rand(1,10),

        ];
    }
}
