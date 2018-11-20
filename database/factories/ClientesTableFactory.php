<?php
use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
         'nombre' => $faker->name,
         'localidad'=> $faker->sentence(1, false),
         'cuit'=> $faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 99999999999),
         'direccion'=> $faker->sentence(3, false),
         'provincia'=>$faker->name

    ];
});


         /*'telefono'=> $faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 99999999999),
         'email' => $faker->unique()->safeEmail,*/