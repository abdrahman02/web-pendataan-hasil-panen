<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produksi>
 */
class ProduksiFactory extends Factory
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
            'klasifikasi_id' => fake()->randomDigitNotNull(),
            'kecamatan_id' => fake()->randomDigitNotNull(),
            'tahun_panen_id' => fake()->randomDigitNotNull(),
            'jumlah' => fake()->numberBetween(1, 20),
            'luas_panen' => fake()->numberBetween(1, 20)
        ];
    }
}
