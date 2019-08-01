<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\CookingRecipe;
use App\User;
use App\DishType;
use App\MealBook;

class AdminController extends Controller
{
    public function getDashboard()
    {
        $recipe_count = CookingRecipe::count();
        $mealbook_count = MealBook::count();
        $dishtype_count = DishType::count();
        $user_count = User::where('role_id', '3')->count();
        $current_user = Auth::user();
        return view('admin.index', ['current_user' => $current_user, 'recipe_count' => $recipe_count, 'mealbook_count' => $mealbook_count, 'dishtype_count' => $dishtype_count, 'user_count' => $user_count]);
    }
    public function getListCookingRecipes()
    {
        $recipesList = CookingRecipe::all();
        return view('admin.cookingRecipes.list',['recipesList'=>$recipesList]);
    }
    public function getUserPage()
    {
        $user_id=$this->param('id');
        return view('admin.user_mypage', ['user_id'=>$user_id]);
    }
}
