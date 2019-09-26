<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Part;
use Faker\Generator as Faker;

$factory->define(\App\Model\Part::class, function (Faker $faker) {
    return [
        'gambar' => $faker->url,
        'nama' => $faker->name,
        'deskripsi' =>  $faker->jobTitle,
        'sku' => $faker->buildingNumber,
        'barcode' => $faker->macAddress,
        'deskripsi' => $faker->catchPhrase,
        'berat' => $faker->randomDigit,
        'harga_beli' => 1000,
        'harga_jual' => 2000,
        'kategori_id' => 0,
        'supplier_id' => 0,
    ];
});
