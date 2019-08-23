<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $commentable = [
        App\Post::class,
        App\MealBook::class,
        App\CookingRecipe::class,
    ];
    $commentableType = $faker->randomElement($commentable);
    $commentable = factory($commentableType)->create();
    return [
        'title' => rtrim($faker->sentence(rand(5,10)),"."),
        'content' => $faker->paragraphs(rand(1,2),true),
        'commentable_type' => $commentableType,
        'commentable_id' => $commentable->id,
    ];
});
