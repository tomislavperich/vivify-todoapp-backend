<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'user_id' => 3
    ];
});
