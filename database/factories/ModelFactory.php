<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [

    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
       	'address' => $faker->address,
       	'phone' => $faker->unique()->e164PhoneNumber,
       	'user_type' => '2',
        'token' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->numberBetween($min = 4, $max = 9),
        'price' => $faker->numberBetween($min = 4000000, $max = 20000000),
        'old_price' => $faker->numberBetween($min = 4000000, $max = 20000000),
       	'description' => $faker->text($maxNbChars = 100),
       	'images' => $faker->imageUrl($width = 640, $height = 480),
       	'status' => $faker->numberBetween($min = 1, $max = 4),
       	'in_stock' => $faker->numberBetween($min = 5, $max = 15),
    ];
});

$factory->define(App\ProductOption::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween($min = 1, $max = 10),
        'option_id' => $faker->numberBetween($min = 1, $max = 9),
        'price_increase' => '0',
    ];
});