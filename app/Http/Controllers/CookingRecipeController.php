<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CookingRecipe;

class CookingRecipeController extends Controller
{
    public function getCookingRecipeList()
    {
        $listRecipes = CookingRecipe::all();
        //return $listRecipes;
        return view('page.cookingRecipes');
    }
    public function getDelete(Request $request)
    {
        $id = $request->id;
        CookingRecipe::find($id)->delete();
        if($request->is('admin/*'))
        return redirect()->route('manageCookingRecipes');
    }
}
