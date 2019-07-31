<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
   
    public function  cookingRecipesComment(){
        return $this->hasMany(Comment::class);
    }
   
}
