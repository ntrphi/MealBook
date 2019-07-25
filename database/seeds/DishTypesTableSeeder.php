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
              'name'=> "Ăn sáng",
            ],
            [
                'name'=>"Ăn vặt",
            ],
            [
                'name'=>"Khai vị",
            ],
            [
                'name'=>"Món chay",
            ],
            [
                'name'=>"Món chính",
            ],
            [
                'name'=>"Làm bánh",
            ],
            [
                'name'=>"Lẩu",
            ],
            [
                'name'=>"Thức uống",
            ],
            [
                'name'=>"Salad",
            ],
            [
                'name'=>"Nước chấm",
            ],
            [
                'name'=>"Bún - Mì - Phở",
            ],
            [
                'name'=>"Snacks",
            ],
          ];
          DB::table('dish_types')->insert($dish_types);
    }
}
