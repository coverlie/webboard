<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 50),
        'topic_id' => rand(1, 50),
        'comment' => $faker->paragraph,
    ];
});
