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
        return [
            'category_id' => $this->faker->numberBetween(1,10),
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2,2,3),
            'discount' => 0,
            'in_stock' => true,
            'description' => $this->faker->text,
        ];
    }
}
