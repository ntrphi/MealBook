<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealBook;
use App\CookingRecipe;
use Auth;

class MealBookController extends Controller
{
    public function index(){
        $meal = MealBook::latest()->paginate(5);
        $recent = CookingRecipe::paginate(5);
        return view('page.meal',compact('meal','recent'));
    }

    public function show($id){
        $mealbook = MealBook::find($id);
        $recent = CookingRecipe::paginate(5);
        return view('page.blog-meal',compact('mealbook','recent'));
    }
    public function create()
    {
        $cooking = CookingRecipe::all();
        return view('frontend.mealbook.add',compact('cooking'));
    }
    public function saveadd(Request $request)
    {
        $name= $request->input('name');
        // nhận 1 mảng ID của món ăn
        $dishes = $_POST['cookingrecipes'];
        // tạo mâm cơm mới lưu trên bảng meal_book
        $meal_book = new MealBook;

        $meal_book->name=$name;
        $meal_book->user_id=$request->role_id;
        $meal_book->save();
        // lưu mealbook_id và dish_id trên bảng trung gian
        $meal_book->mealBookDishes()->sync($dishes);
        // return về trang nào đấy
        return redirect()->route('index');
    }
}
