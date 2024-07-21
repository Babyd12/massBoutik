<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UinitPerPackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayPack = ['Douzaine', 'Dixaine', 'Demi Douzaine', 'Demain Dixaine', 'Deux Douzaine'];
        return [
            'title' => Arr::rand($arrayPack),
            'title' => rand(10, 12)
        ];
    }
}
