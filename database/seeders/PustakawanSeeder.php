<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PustakawanSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'pustakawan@del.ac.id'],
            ['name' => 'Pustakawan Del', 'password' => 'password123']
        );
    }
}
