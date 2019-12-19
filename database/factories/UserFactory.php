<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "Antoni",
        'email' => "prueba@gmail.com",
        'email_verified_at' => now(),
        'password' => bcrypt('123456789'), // password
        'remember_token' => Str::random(10),
    ];
});

