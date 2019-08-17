<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient =[ 
            ['name'=> "Muối",],['name'=> "Đường",],['name'=> "Bột ngọt",] ,[  'name'=> "Hành khô" ,],[  'name'=> "Tỏi",],['name'=> "Quế",],['name'=> "Húng lìu",],['name'=> "Hồ tiêu",],['name'=> "Thảo quả",] ,[  'name'=> "Hồi " ,],[  'name'=> "Gừng",],['name'=> "Quế",],['name'=> "Nghệ",],['name'=> "Riềng",],['name'=> "Me chua",] ,[  'name'=> " chanh " ,],[  'name'=> "hành lá",],['name'=> "hành tây",],['name'=> "Nước Mắm",],['name'=> "Rượu",],['name'=> "Nước Cốt Dừa",] ,[  'name'=> "Nước Cốt Chanh " ,],[  'name'=> "Thì là ",],['name'=> "Sả",],['name'=> "Rau thơm",],['name'=> "Rau răm",],['name'=> "Rau mùi",] ,[  'name'=> "Tía tô " ,],[  'name'=> "Ngổ om ",],['name'=> "Lá Mơ",]
          ];
          DB::table('ingredients')->insert($ingredient);
    }
}
