<?php

use Illuminate\Database\Seeder;

class DishTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dish_types =[ 
            [
              'name'=> "Sườn Xào Chua Ngọt",
            ],
            [
                'name'=>"Rau Muống Nấu Chua",
            ],
            [
                'name'=>"Bò Xào Xả Ớt",
            ],
            [
                'name'=>"Ếch Nấu Chua",
            ],
            [
                'name'=>"Gà Xào Lăn",
            ]
          ];
          DB::table('dish_types')->insert($dish_types);
    }
}
