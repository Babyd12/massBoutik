<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\UnitPerPack;
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
            'name' => $this->faker->sentence(3),
            'purchace_price' => $this->faker->randomFloat(2, 1, 100),
            'selling_price' => $this->faker->randomFloat(2, 1, 100),
            'state' => fake()->boolean(true),
            'unit_per_pack_id' => UnitPerPack::factory(1), // Assuming a Category model exists
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
