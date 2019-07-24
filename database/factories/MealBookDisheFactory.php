<?php

use Faker\Generator as Faker;

$factory->define(App\MealBookDishe::class, function (Faker $faker) {
    return [
        'meal_book_id'=>App\MealBook::Pluck('id')->random(),
        'dish_id'=>App\DishType::Pluck('id')->random(),
    ];
});
