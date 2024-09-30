<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Hot', 'Newest'];
        $typesRandKey = $types[array_rand($types)];

        return [
            'name' => $typesRandKey,
            'slug' => Str::slug($typesRandKey),
            'status' => rand(0, 1)
        ];
    }
}
