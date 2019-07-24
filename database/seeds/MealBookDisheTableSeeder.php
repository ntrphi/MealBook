<?php

use Illuminate\Database\Seeder;

class MealBookDisheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MealBookDishe::class,10)->create();
    }
}
