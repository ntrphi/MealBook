<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    protected $fillable = [
        'name'
    ];
    public function  cookingRecipe(){
        return $this->hasMany(CookingRecipe::class);
    }
}
