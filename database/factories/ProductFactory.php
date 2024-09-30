<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = [2, 3];
        $typesRandKey = array_rand($types);

        return [
            'name' => fake()->name(),
            'description' => fake()->text(10),
            'price' => fake()->numberBetween(300, 400),
            'type_id' => $types[$typesRandKey],
            'published_at' => 'GGWP',
            'not_allow_promotion' => rand(1, 2),
            'handle' => Str::slug(fake()->name()),
            'page_title' =>  fake()->name()
        ];
    }
}
