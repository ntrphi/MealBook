<?php

use Faker\Generator as Faker;

$factory->define(App\Point::class, function (Faker $faker) {
    $pointable = [
        App\Post::class,
        App\MealBook::class,
        App\CookingRecipe::class,
    ];
    $pointableType = $faker->randomElement($pointable);
    $pointable = factory($pointableType)->create();
    return [
        'point'=> 1,
        'pointable_type' => $pointableType,
        'pointable_id' => $pointable->id,
    ];
});
