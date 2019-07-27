<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CookingRecipe;

class CookingRecipeController extends Controller
{
    public function getCookingRecipeList()
    {
        $listRecipes = CookingRecipe::all();
        return $listRecipes;
    }
}
