<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CookingRecipe;

class CookingRecipeController extends Controller
{
    public function getListCookingRecipes()
    {
        $cookingRecipeList = CookingRecipe::all();
        var_dump($cookingRecipeList); die;
    }
}
