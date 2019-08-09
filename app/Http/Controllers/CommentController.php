<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\MealBook;
use App\CookingRecipe;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Post $post,Request $request){
       $post->comment()->create(['user_id'=>Auth::user()->id,'title'=>$request->title,'content'=>$request->content,]);
       return back();
    }
    public function cookingComment(CookingRecipe $cooking,Request $request){
   
        $cooking->comment()->create(['user_id'=>Auth::user()->id,'title'=>$request->title,'content'=>$request->content,]);
        return back();
     }
     public function mealbookComment(MealBook $mealbook,Request $request){
      $mealbook->comment()->create(['user_id'=>Auth::user()->id,'title'=>$request->title,'content'=>$request->content,]);
      return back();
   }
}
