<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleados;
use Faker\Generator as Faker;

$factory->define(Empleados::class, function (Faker $faker) {
    return [
        'apellidos' =>$faker->lastname,
        'nombres' => $faker->name,
        'direccion' => $faker->address,
        'dni' =>  rand(10000000,99999999),
        //'telefono' => $faker->phoneNumber,
        'telefono' => rand(900000000,999999999),
        'correo' => $faker->unique()->safeEmail,
        'cargo_id'=> rand(1, 3)
    ];
});
