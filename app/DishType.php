<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    public function  cookingRecipe(){
        return $this->hasMany(CookingRecipe::class);
    }
}
