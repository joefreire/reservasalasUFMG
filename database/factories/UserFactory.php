<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Sala;
use App\Models\Departamento;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$departamentos = 
$factory->define(Sala::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'capacidade' => $faker->randomElement($array = array (50,60,70,100)),

    ];
});
