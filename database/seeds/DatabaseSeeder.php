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
         $this->call(RolesTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(DishTypesTableSeeder::class);
         $this->call(MealBookTableSeeder::class);
         $this->call(CookingRecipeTableSeeder::class);
         $this->call(MealBookDisheTableSeeder::class);
         $this->call(PointsTableSeeder::class);
         $this->call(MealBookCommentTableSeeder::class);
         $this->call(CookingRecipesCommentTableSeeder::class);
         

         // factory(App\User::class, 5)->make();
            // ->each(function($item){
            //     $item->mealBook()->saveMany(factory(App\MealBook::class,rand(1,10))->make())
            //  ->each(function($cooking_repice){
            //     $cooking_repice->cookingRepice()->saveMany(factory(
            //         App\CookingRepice::class,rand(1,10))->make());
            // });
            // factory(App\MealBook::class, rand(1,10))->make();
            // factory(App\CookingRepice::class, rand(1,10))->make();

    }
}
