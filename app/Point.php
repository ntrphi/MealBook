<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function  mealBookComment(){
        return $this->hasMany(MealBookComment::class);
    }
    public function  cookingRecipesComment(){
        return $this->hasMany(CookingRecipesComment::class);
    }
   
}
