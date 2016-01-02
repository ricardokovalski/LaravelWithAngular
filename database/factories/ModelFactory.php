<?php

$factory->define(ProjectRico\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(ProjectRico\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'responsavel' => $faker->name,
        'email' => $faker->email,
        'telefone' => $faker->phoneNumber,
        'endereco' => $faker->address,
        'observacoes' => $faker->sentence,
    ];
});

$factory->define(ProjectRico\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'progress' => $faker->numberBetween(0, 100),
        'status' => $faker->randomElement(['A','F','P']),
        'due_date' => $faker->dateTime,
        'owner_id' => $faker->numberBetween(1, 10),
        'client_id' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(ProjectRico\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,20),
        'title' => $faker->word,
        'note' => $faker->paragraph,        
    ];
});

$factory->define(ProjectRico\Entities\ProjectTask::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1, 20),
        'name' => $faker->sentence,
        'due_date' => $faker->dateTime('now'),
        'start_date' => $faker->dateTime('now'),
        'status' => $faker->randomElement(['A','F','P']),
    ];
});

$factory->define(ProjectRico\Entities\ProjectMember::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,20),
        'user_id' => rand(1,10),
    ];
});