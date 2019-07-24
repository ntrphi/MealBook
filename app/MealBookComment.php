<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealBookComment extends Model
{
    protected $fillable = [
        'title','content'
    ];
 
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mealBook(){
        return $this->belongsTo(MealBook::class);
    }
    
    public function point(){
        return $this->belongsTo(Point::class);
    }
}
