<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
     
        'user_id' => App\User::pluck('id')->random(),
        'title' => rtrim($faker->sentence(rand(1,5)),"."),
        'content' =>  $faker->paragraphs(rand(4,7),true),
        'image'=>"http://lorempixel.com/400/300",
    ];
});
