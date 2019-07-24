<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingRecipesComment extends Model
{
    protected $fillable = [
        'title','content'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cookingRecipes(){
        return $this->belongsTo(CookingRecipe::class);
    }
    
    public function point(){
        return $this->belongsTo(Point::class);
    }
}
