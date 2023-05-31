<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->userName(),
            'kode' => fake()->regexify('[A-Za-z0-9]{8}'),
            'dosis' => "3 x 1",
            'indikasi' => fake()->text(15),
            'kategori_id' => mt_rand(1, 2),
            'satuan_id' => mt_rand(1, 2),
        ];
    }
}
