<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CookingRecipe extends Model
{   

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    
    protected $fillable = [
        'name','avatar','ingredient','recipe',  'dish_type_id', 'author_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function dishType(){
        return $this->belongsTo(DishType::class,'dish_type_id');
    }
    public function  comment(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function  point(){
        return $this->morphOne(Point::class,'pointable');
    }

    public function isPoint(){
      return $this->point()->where('user_id',$this->author_id)->count()>0;
            
    }
    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
    public function  ingredientDetail(){
        return $this->hasMany(IngredientDetail::class);
    }
    public function theIngredient(){
        return $this->ingredientDetail()->where('cooking_recipe_id',$this->id)->get();
    }
}
