<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cargo;
use Faker\Generator as Faker;

$factory->define(Cargo::class, function (Faker $faker) {
    return [
        'cargo' =>ucfirst($faker->word()),
        'sueldo' =>rand(1200,4800)
    ];
});
