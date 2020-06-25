<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name(50),
        'countryCode' => $faker->countryCode(5),
        'shop_id' => $faker->randomNumber(),
    ];
});
