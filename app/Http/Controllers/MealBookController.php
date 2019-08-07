<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealBook;
use App\CookingRecipe;
use Auth;

class MealBookController extends Controller
{
    public function create()
    {
        $cooking = CookingRecipe::all();
        return view('frontend.mealbook.add',compact('cooking'));
    }
    public function saveadd(Request $request)
    {
        $dishes = $_POST['cookingrecipes'];
        dd($dishes,$request);
        $user_id=1;
        $name= $request->input('name');
        // nhận 1 mảng ID của món ăn
        $dishes = $_POST['cookingrecipes'];
        // tạo mâm cơm mới lưu trên bảng meal_book
        $meal_book = new MealBook;

        $meal_book->name=$name;
        $meal_book->user_id=$user_id;
        $meal_book->save();
        // lưu mealbook_id và dish_id trên bảng trung gian
        $meal_book->mealBookDishes()->sync($dishes);

    }
}
