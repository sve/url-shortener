<?php

$factory->define(
    App\Containers\Link\Models\Link::class, function (Faker\Generator $faker) {

        return [
            'url' => $faker->url,
            'uid' => $faker->md5,
        ];
    }
);
