<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealBook extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getAuthor(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
    public function mealBookDishes()
    {
        return $this->belongsToMany('App\CookingRecipe','meal_book_dishes','meal_book_id','cooking_recipe_id');
    }
  
}
