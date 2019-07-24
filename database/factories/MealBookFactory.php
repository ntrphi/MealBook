<?php

use Faker\Generator as Faker;

$factory->define(App\MealBook::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => App\User::pluck('id')->random(),
        
    ];
});
