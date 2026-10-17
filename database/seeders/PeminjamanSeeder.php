<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Kategori::first();

        // Buku uji: stok = 0 (untuk bukti penolakan) dan stok = 1 (untuk bukti stok habis setelah dipinjam)
        Buku::firstOrCreate(['isbn' => '978-000-00000-0'], [
            'judul'        => 'Buku Uji Stok Nol',
            'penulis'      => 'Tim Praktikum PPW',
            'penerbit'     => 'IT Del Press',
            'tahun_terbit' => 2024,
            'kategori_id'  => $kategori->id,
            'stok'         => 0,
            'sinopsis'     => 'Buku uji untuk membuktikan penolakan peminjaman saat stok 0.',
        ]);

        Buku::firstOrCreate(['isbn' => '978-000-00000-1'], [
            'judul'        => 'Buku Uji Stok Satu',
            'penulis'      => 'Tim Praktikum PPW',
            'penerbit'     => 'IT Del Press',
            'tahun_terbit' => 2024,
            'kategori_id'  => $kategori->id,
            'stok'         => 1,
            'sinopsis'     => 'Buku uji untuk membuktikan stok turun jadi 0 setelah dipinjam.',
        ]);

        // Sampel transaksi peminjaman
        $a = Buku::where('stok', '>', 2)->orderBy('id')->first();
        $b = Buku::where('stok', '>', 2)->orderByDesc('id')->first();

        $data = [
            ['PJM-SEED-0001', $a, '12S24001', 'Andi Siregar',   'dipinjam'],
            ['PJM-SEED-0002', $b, '12S24002', 'Budi Hutapea',   'dipinjam'],
            ['PJM-SEED-0003', $a, '12S24003', 'Citra Sitorus',  'dikembalikan'],
        ];

        foreach ($data as [$kode, $buku, $nim, $nama, $status]) {
            $pinjam = Peminjaman::firstOrCreate(['kode_pinjam' => $kode], [
                'buku_id'             => $buku->id,
                'nim_peminjam'        => $nim,
                'nama_peminjam'       => $nama,
                'tanggal_pinjam'      => now()->subDays(3)->toDateString(),
                'tanggal_jatuh_tempo' => now()->addDays(4)->toDateString(),
                'tanggal_kembali'     => $status === 'dikembalikan' ? now()->subDay()->toDateString() : null,
                'status'              => $status,
            ]);

            // Jaga konsistensi stok: yang masih dipinjam mengurangi stok
            if ($pinjam->wasRecentlyCreated && $status === 'dipinjam') {
                $buku->decrement('stok');
            }
        }
    }
}