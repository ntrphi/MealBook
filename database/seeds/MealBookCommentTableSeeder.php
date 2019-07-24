<?php

use Illuminate\Database\Seeder;

class MealBookCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MealBookComment::class,10)->create();
        
    }
}
