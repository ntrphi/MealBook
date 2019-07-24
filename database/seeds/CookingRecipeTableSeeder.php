<?php

use Illuminate\Database\Seeder;

class CookingRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CookingRecipe::class, 10)->create();
    }
}
