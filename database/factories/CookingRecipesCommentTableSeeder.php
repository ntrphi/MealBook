<?php

use Faker\Generator as Faker;

$factory->define(App\CookingRecipesComment::class, function (Faker $faker) {
    return [
        'cooking_recipes_id' => App\CookingRecipe::pluck('id')->random(),
        'title' =>rtrim($faker->sentence(rand(5,10)),"."),
        'content'=>$faker->paragraphs(rand(1,3),true),
        'point' => App\Point::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
    ];
});
