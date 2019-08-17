<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealBook;
use App\CookingRecipe;
use Auth;
use Validator;

class MealBookController extends Controller
{
    public function index(){
        $first = MealBook::first();
        $meal = MealBook::latest()->paginate(5);
        $recent = CookingRecipe::paginate(5);
        return view('page.meal',compact('meal','recent','first'));
    }

    public function show($id){
        $mealbook = MealBook::find($id);
        $recent = CookingRecipe::orderBy('created_at', 'asc')->limit(5)->get();
        return view('page.blog-meal',compact('mealbook','recent'));
    }
    public function create()
    {
        $cooking = CookingRecipe::all();
        return view('frontend.mealbook.add',compact('cooking'));
    }
    public function saveadd(Request $request)
    {
        $rules = [
    		'name' => 'required | min:4|max:30|unique:meal_books',    
            'short_desc' => 'required | min:4',
            'cookingrecipes' =>'required |array|min:3',
          
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
            'min' => ':attribute quá ít mời nhập nhiều hơn.',
            'cookingrecipes.min' => 'Tối thiểu 1 mâm 3 món ăn',
		    'max' => ':attribute có vẻ tên hơi dài bạn rút gọn bớt.',
		    'name.unique' => ':attribute đã có, mời ghi nội dung khác',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);       
    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {

        $name= $request->input('name');
        // nhận 1 mảng ID của món ăn
        $dishes = $_POST['cookingrecipes'];
    
        // tạo mâm cơm mới lưu trên bảng meal_book
        $meal_book = new MealBook;

        $meal_book->name=$name;
        $meal_book->short_desc = $request->short_desc;
        $meal_book->user_id=$request->role_id;
        $meal_book->save();
        // lưu mealbook_id và dish_id trên bảng trung gian
        $meal_book->mealBookDishes()->sync($dishes);
        // return về trang nào đấy
        return redirect()->route('index');
        }
    }
}
