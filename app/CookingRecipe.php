<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingRecipe extends Model
{
    protected $fillable = [
        'name','avatar','ingredient','recipe',
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function dishType(){
        return $this->belongsTo(DishType::class);
    }
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
}
