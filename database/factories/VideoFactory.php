<?php

/** @var Factory $factory */

use App\User;
use App\Video;
use App\VideoTranslation;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Arr;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'duration' => $faker->time(),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        }
    ];
});

$factory->define(VideoTranslation::class, function (Faker $faker) {
    return [
        'video_id' => function() {
            return factory(VideoTranslation::class)->create()->id;
        },
        'locale' => substr($faker->locale(),0,2),
        'name' => $faker->streetName(),
        'description' => $faker->realTextBetween(100, 250),
    ];
});
