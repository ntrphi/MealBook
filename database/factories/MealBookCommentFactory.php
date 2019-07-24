<?php

use Faker\Generator as Faker;

$factory->define(App\MealBookComment::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'title' =>rtrim($faker->sentence(rand(5,10)),"."),
        'content'=>$faker->paragraphs(rand(1,3),true),
        'mealbook_id' => App\MealBook::pluck('id')->random(),
        'point' => App\Point::pluck('id')->random(),
    ];
});
