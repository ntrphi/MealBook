<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use Auth;
use App\MealBook;
use App\CookingRecipe;
class PointController extends Controller
{

    public function mealbookPoint(Request $request){
        $mealbook = MealBook::find($request->id);
        $mealbook->point()->create(['user_id'=>Auth::user()->id,'point'=>$request->point]);
                return back();

     }
     

     public function destroyMealbookPoint(Request $request){
        $mealbook = MealBook::find($request->id);
        $mealbook->point()->where('user_id',auth()->id())->delete();
        return back();
     }



     public function cookingPoint(Request $request){
        
        $cooking = CookingRecipe::find($request->id);
        $cooking->point()->create(['user_id'=>Auth::user()->id,'point'=>$request->point]);
                return back();
         
     }
     public function destroyCookingPoint(Request $request){
        $cooking = CookingRecipe::find($request->id);
        $cooking->point()->where('user_id',auth()->id())->delete();
        return back();
     }
}
