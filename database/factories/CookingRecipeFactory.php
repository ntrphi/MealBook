<?php

use Faker\Generator as Faker;

$factory->define(App\CookingRecipe::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'dish_type_id'=> App\DishType::Pluck('id')->random(),
        'author_id' => App\User::Pluck('id')->random(),
        'avatar'=>"http://lorempixel.com/400/300/food",
        'ingredient' =>$faker->paragraphs(rand(1,2),true),
        'recipe'=>$faker->paragraphs(rand(1,2),true),

    ];
});
