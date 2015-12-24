<?php

$factory->define(ProjectRico\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(ProjectRico\Client::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'responsavel' => $faker->name,
        'email' => $faker->email,
        'telefone' => $faker->phoneNumber,
        'endereco' => $faker->address,
        'observacoes' => $faker->sentence,
    ];
});