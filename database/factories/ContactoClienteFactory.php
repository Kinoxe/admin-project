<?php

use Faker\Generator as Faker;
use App\ContactoCliente;

$factory->define(ContactoCliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'id_cliente'=> $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 50),
        'telefono'=> $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 99999999),
        'email'=>$faker->email

   ];
});
