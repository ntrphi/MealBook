<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $points =[ 
            [
              'value'=> "5",
            ],
            [
                'value'=> "8",
            ],
            [
                'value'=> "4",
            ]
            ,
            [
                'value'=> "7",
            ]
            ,
            [
                'value'=> "3",
            ]
            ,
            [
                'value'=> "6",
            ]
          ];
          DB::table('points')->insert($points);
    }
}
