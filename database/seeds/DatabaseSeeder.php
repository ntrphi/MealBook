<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([RolesTableSeeder::class,DishTypesTableSeeder::class,PointsTableSeeder::class]);
    
         factory(App\User::class, 5)->create()
            ->each(function($item){
                $item->mealBook()->saveMany(factory(App\MealBook::class,rand(1,10))->make()
                )->each(function($meal){
                    $meal->mealBookDishe()->saveMany(factory(App\MealBookDishe::class,rand(1,2))->make());
                     });
                $item->cookingRecipe()->saveMany(factory(App\CookingRecipe::class,rand(1,10))->make());
                $item->post()->saveMany(factory(App\Post::Class,rand(1,10))->make());
                $item->comment()->saveMany(factory(App\Comment::class,rand(1,20))->make());
        });
    }
}
