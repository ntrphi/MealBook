<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealBookDishe extends Model
{
    protected $fillable = [
        'meal_book_id','dish_id'
    ];
    public $timestamps = false;
    public function  mealBook(){
        return $this->belongsTo(MealBook::class);
    }
    
    public function  cookingRecipe(){
        return $this->belongsTo(CookingRecipe::class);
    }
}
