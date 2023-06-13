<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->words($this->faker->numberBetween(3, 5), true),
            'price' => $this->faker->randomFloat(2, 50, 10000),
            'description' => $this->faker->paragraphs($this->faker->numberBetween(1, 3), true)
        ];
    }
}
