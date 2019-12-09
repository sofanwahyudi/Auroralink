<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Model\Pelanggan;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 50; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		$pelanggan = Pelanggan::create([
                'name' => $faker->name,
                'email' =>  $faker->email,
                'telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'users_id' => 2,
    		]);

    	}
    }
}
