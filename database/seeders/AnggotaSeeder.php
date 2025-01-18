<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 2000; $i++) {
            $data[] = [
                'nomor_kta' => $faker->numerify('################'), // 16 angka acak
                'nama' => $faker->name,
                'nik' => $faker->numerify('################'), // 16 angka acak
                'selectedVillage' => $faker->numberBetween(1, 10),
                'selectedDistrict' => $faker->numberBetween(1, 15),
                'selectedCity' => $faker->numberBetween(1, 15),
                'selectedProvince' => $faker->numberBetween(1, 25),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('anggotas')->insert($data); // Ganti 'members' dengan nama tabel Anda
    }
}
