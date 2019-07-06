<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Plan;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->word,
        'provider_id' => Str::slug($name),
        'teams' => true,
        'teams_limit' => array_random(range(2, 10)),
    ];
});
