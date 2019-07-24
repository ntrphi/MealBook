<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingRecipe extends Model
{
    protected $fillable = [
        'name','avatar','ingredient','recipe',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function dishType(){
        return $this->belongsTo(DishType::class);
    }
    public function  cookingRecipesComment(){
        return $this->hasMany(CookingRecipesComment::class);
    }
    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
}
