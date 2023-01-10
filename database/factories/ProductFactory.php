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
    public function definition()
    {
        return [
            'barcode' => rand(1111111111, 9999999999),
            'name' => $this->faker->name,
            'quantity' => rand(1, 100),
            'price' => rand(50, 1000000)
        ];
    }
}
