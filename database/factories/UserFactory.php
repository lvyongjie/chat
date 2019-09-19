<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    // return [
    //     'cname' => $faker->name,
    //     'status' => rand(1,2),
    //     'password' => bcrypt('123456'),
    //     'type' => 'company',
    //     'tel' => '88888888',
    //     'created_at' => date('Y-m-d h:i:s', time())
    // ];
    return [
        'cname' => $faker->name,
        'status' => rand(1,2),
        'password' => bcrypt('123456'),
        'type' => rand(6,10),
        'tel' => '88888888',
        'created_at' => date('Y-m-d h:i:s', time())
    ];
});
