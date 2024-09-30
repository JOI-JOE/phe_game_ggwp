<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        return [
            'product_id' => fake()->numberBetween(11, 16),
            'price' => fake()->numberBetween(100, 1000),
            'sku' => fake()->unique()->regexify('[A-Z0-9]{10}'),
            'inventory_quantity' => fake()->numberBetween(1, 100),
            'page' => fake()->numberBetween(50, 100),
        ];
    }
}
