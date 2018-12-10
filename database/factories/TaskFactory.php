<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'desc' => $faker->realText($maxNbChars = 86, $indexSize = 2),
        'user_id' => 3,
        'is_checked' => $faker->randomElement($array = array (true, false))
    ];
});
