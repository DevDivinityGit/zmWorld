<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => preg_replace('/ /', '-', strtolower($name)),
         'quantity' => 10,
        'description' => Str::random(10),
        'price' => rand(100, 5000),


    ];
});
