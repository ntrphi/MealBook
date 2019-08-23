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
  
        $dishes = $_POST['cookingrecipes'];
  
        $meal_book = new MealBook;

        $meal_book->name=$name;
        $meal_book->short_desc = $request->short_desc;
        $meal_book->user_id=$request->role_id;
        $meal_book->save();
    
        $meal_book->mealBookDishes()->sync($dishes);
     
        return redirect()->route('index');
        }
    }

    public function  edit($id){
   
        $cooking = CookingRecipe::all();
        $mealbook = MealBook::find($id);

        return view('admin.mealbooks.form',compact('mealbook','cooking'));
    }

    public function update(Request $request){
        $dishes = $request->cookingrecipes;
      
       $mealbook = MealBook::find($request->id);
  
       $mealbook->name = $request->name;
       $mealbook->short_desc = $request->short_desc;
       $mealbook->user_id = $request->role_id;
       $mealbook->save();
     
       $mealbook->mealBookDishes()->sync($dishes);
    
       return redirect()->route('mealbook.list');
    }

    public function destroy($id){
        $mealbook = MealBook::withTrashed()->find($id);
        if($mealbook->trashed()){
            $mealbook->mealBookDishes()->detach();
            $mealbook->forceDelete();
            return redirect()->route('mealbook.list');
        }
      
        $mealbook->delete();
        return redirect()->route('mealbook.list');
     
    }
    public function restore($id){
        $mealbook = MealBook::withTrashed()->find($id);
        $mealbook->restore();
        return redirect()->route('mealbook.list');

    }
}
