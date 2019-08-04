<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\CookingRecipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Post $post,Request $request){
       $post->comment()->create(['user_id'=>$post->user_id,'title'=>$request->title,'content'=>$request->content,]);
       return back();
    }
    public function cookingComment(CookingRecipe $cooking,Request $request){
   
        $cooking->comment()->create(['user_id'=>$cooking->author_id,'title'=>$request->title,'content'=>$request->content,]);
        return back();
     }
}
