<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealBook extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function  mealBookComment(){
        return $this->hasMany(MealBookComment::class);
    }
    public function  mealBookDishe(){
        return $this->hasMany(MealBookDishe::class);
    }
  
  
}
