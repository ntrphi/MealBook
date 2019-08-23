<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\CookingRecipe;
use App\User;
use App\DishType;
use App\MealBook;
use App\Comment;
use App\Post;
use App\IngredientSample;

class AdminController extends Controller
{
    public function getDashboard()
    {

        $recipe_count = CookingRecipe::count();
        $mealbook_count = MealBook::count();
        $dishtype_count = DishType::count();
        $post_count = Post::count();
        $comment_count = Comment::count();
        $ingredient_count = IngredientSample::count();
        $user_count = User::whereHas('role', function ($query) {
            $query->where('name', 'like', 'Member');
        })->count();
        $current_user = Auth::user();
        return view('admin.index', compact('recipe_count','mealbook_count','dishtype_count','post_count','comment_count','user_count','ingredient_count'));
    }
    public function getListCookingRecipes()
    {
        if (Auth::user()->role->name=="Member") {
         $recipesList = CookingRecipe::withTrashed()->where('author_id',Auth::user()->id)->get();
            
        } else $recipesList = CookingRecipe::withTrashed()->get();
        return view('admin.cookingRecipes.list', ['recipesList' => $recipesList]);
    }
    public function getUserPage(Request $request)
    {
        $user_id = $request->id;
        $user = User::find($user_id);
        return view('admin.user_mypage', ['user' => $user]);
    }
    public function getUserList()
    {
        $users = User::withTrashed()->paginate(10);
        return view('admin.user.list', ['users' => $users]);
    }
    public function getDishTypeList()
    {
        $dishtypes = DishType::paginate(10);
        return view('admin.dishtypes.list', ['dishtypes'=>$dishtypes]);
    }
    public function getMealBookList()
    {
        $mealbooks = MealBook::withTrashed()->paginate(10);
        return view('admin.mealbooks.list',compact('mealbooks'));
    }
    public function getCommentList(){
        $comment = Comment::latest()->paginate(10);
        return view('admin.comments.list',compact('comment'));
    }
    public function getIngredientList(){
        $ingredient = IngredientSample::latest()->paginate(10);
        return view('admin.ingredient.list',compact('ingredient'));
    }
}
