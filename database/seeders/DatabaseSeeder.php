<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produksi;
use App\Models\Kecamatan;
use App\Models\TahunPanen;
use Illuminate\Database\Seeder;
use App\Models\KlasifikasiTanaman;
use App\Models\Tanaman;
use App\Models\TanamanKecamatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Kecamatan::factory(9)->create();
        // KlasifikasiTanaman::factory(9)->create();
        // TahunPanen::factory(9)->create();
        // Tanaman::factory(20)->create();
        // TanamanKecamatan::factory(9)->create();
        // Produksi::factory(20)->create();
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
