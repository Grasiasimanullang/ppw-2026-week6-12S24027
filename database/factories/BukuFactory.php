<?php

namespace Database\Factories;
use App\Models\Kategori;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'isbn'         => fake()->unique()->isbn13(),
        'judul'        => Str::title(fake()->words(rand(3, 6), true)),
        'penulis'      => fake()->name(),
        'penerbit'     => fake()->randomElement([
            'Gramedia Pustaka Utama', 'Erlangga', 'Informatika Bandung',
            'Andi Offset', 'Mizan', 'Deepublish',
        ]),
        'tahun_terbit' => fake()->numberBetween(2005, (int) date('Y')),
        'kategori_id'  => Kategori::factory(),
        'stok'         => fake()->numberBetween(0, 25),
        'sinopsis'     => fake()->paragraph(3),
    ];
}
}
