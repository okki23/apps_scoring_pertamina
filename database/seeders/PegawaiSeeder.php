<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pegawai')->insert([ 
    			'nopek' => $faker->name,
    			'nama' => $faker->jobTitle,
                'id_jenis_pekerjaan' => $faker->jobTitle,
    			'pegawai_umur' => $faker->numberBetween(25,40),
    			'pegawai_alamat' => $faker->address
    		]);
 
    	}
    }
}
