<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealBook extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name'
    ];

    public function getAuthor(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function  point(){
        return $this->morphOne(Point::class,'pointable');
    }
    public function isPoint(){
        return $this->point()->where('user_id',$this->user_id)->count()>0;
    }
    public function pointSum(){
        return $this->point()->where('user_id',$this->id)->sum('point');
    }

    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
    public function mealBookDishes()
    {
        return $this->belongsToMany('App\CookingRecipe','meal_book_dishes','meal_book_id','cooking_recipe_id');
    }
  
}
