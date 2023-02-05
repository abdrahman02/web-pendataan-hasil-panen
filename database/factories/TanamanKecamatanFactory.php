<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TanamanKecamatan>
 */
class TanamanKecamatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanaman_id' => fake()->randomDigitNotNull(),
            'kecamatan_id' => fake()->randomDigitNotNull()
        ];
    }
}
