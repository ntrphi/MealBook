<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientDetail extends Model
{
    protected $fillable = [
        'ingredient','amount',
    ];
}
