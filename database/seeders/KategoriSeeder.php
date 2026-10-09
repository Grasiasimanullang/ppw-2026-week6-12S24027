<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['INF', 'Informatika & Pemrograman'],
            ['ELK', 'Teknik Elektro'],
            ['SIS', 'Sistem Informasi'],
            ['MAT', 'Matematika & Statistika'],
            ['MNJ', 'Manajemen & Bisnis'],
            ['UMM', 'Referensi Umum'],
        ];

        foreach ($data as [$kode, $nama]) {
            Kategori::updateOrCreate(
                ['kode_kategori' => $kode],
                ['nama_kategori' => $nama]
            );
        }
    }
}