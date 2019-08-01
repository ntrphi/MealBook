<?php

namespace App\Http\Controllers;

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
        $user_count = User::where('role', '3')->count();
        return view('admin.index', ['recipe_count' => $recipe_count, 'mealbook_count' => $mealbook_count, 'dishtype_count' => $dishtype_count, 'user_count' => $user_count]);
    }
    public function getUserPage()
    {
        $user_id=$this->param('id');
        return view('admin.user_mypage', ['user_id'=>$user_id]);
    }
}
