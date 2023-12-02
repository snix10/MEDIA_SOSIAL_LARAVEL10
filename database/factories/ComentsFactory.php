<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coments>
 */
class ComentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coments' => $this->faker->sentence(mt_rand(3,8)),
            'users_id'  => mt_rand(1,10),
            'posts_id'  => mt_rand(1,20),
            'image_coments'  => $this->faker->sentence(mt_rand(1,2)),

        ];
    }
}
