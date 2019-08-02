<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\CookingRecipe;
use App\DishType;


class CookingRecipeController extends Controller
{
    public function getCookingRecipeList()
    {
        $listRecipes = CookingRecipe::all();
        //return $listRecipes;
        return view('page.cookingRecipes');
    }
    public function getById($id)
    {
        return  CookingRecipe::find($id);
    }
    public function getDelete(Request $request)
    {
        $id = $request->id;
        CookingRecipe::find($id)->delete();
        if ($request->is('admin/*'))
            return redirect()->route('manageCookingRecipes');
    }
    public function getUpdateRecipe(Request $request)
    {
        $id = $request->id;
        $cooking_recipe = $this->getById($id);
        $dish_types = $this->getAllDishTypes();
        if ($cooking_recipe == '') {
            return redirect()->route('manageCookingRecipes');
        }
        if ($cooking_recipe->author_id == Auth::user()->id) {
            return view('admin.cookingRecipes.edit', ['recipe' => $cooking_recipe, 'dish_types' => $dish_types]);
        } else {
            return redirect()->route('manageCookingRecipes');
        }
    }

    public function postUpdateRecipe(Request $request)
    {
        $id = $request->id;
        $cooking_recipe = $this->getById($id);
        $cooking_recipe->name = $request->input('name');
        $cooking_recipe->ingredient = $request->input('ingredient');
        $cooking_recipe->recipe = $request->input('recipe');
        $cooking_recipe->dish_type_id = $request->input('dish_type_id');
        $cooking_recipe->save();
        return redirect()->route('manageCookingRecipes');
    }
    public function getAllDishTypes()
    {
        return DishType::all();
    }
}
