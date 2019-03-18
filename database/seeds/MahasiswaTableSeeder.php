<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
		        DB::table('mahasiswa')->insert([
		            'nama' => $faker->name,
		            'prodi_id' => mt_rand(1, 3),
		            'jenis_kelamin' => 'P',
		        ]);
		}

        foreach (range(1,10) as $index) {
                DB::table('mahasiswa')->insert([
                    'nama' => $faker->name,
                    'prodi_id' => mt_rand(1, 3),
                    'jenis_kelamin' => 'L',
                ]);
        }
    }
}
