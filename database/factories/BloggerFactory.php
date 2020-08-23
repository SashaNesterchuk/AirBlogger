<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blogger;
use Faker\Generator as Faker;

$factory->define(Blogger::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'avatar' => $faker->imageUrl()
    ];
});
