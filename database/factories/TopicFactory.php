<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,50),
        'topic' => $faker->sentence,
        'content' => $faker->paragraph,

    ];
});
