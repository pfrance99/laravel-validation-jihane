<?php

use Faker\Generator as Faker;

$factory->define(App\Thumbnail::class, function (Faker $faker) {
    return [
        'legend' => $faker->catchPhrase,
        'imageUrl' => $faker->imageUrl(),
        'description' => $faker->text
    ];
});
