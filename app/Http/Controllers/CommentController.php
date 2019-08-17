<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\MealBook;
use App\CookingRecipe;
use App\Comment;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{

  

    public function postComment(Post $post,Request $request){
      $this->authorize('create');	
      $rules = [
         'title' => 'required | min:4',
         'content' => 'required | min: 4',
      ];

      $msg = [
         'required' => ':attribute không được bỏ trống.',
         'min' => ':attribute quá ngắn',
      ];

      $validator = Validator::make($request->all(), $rules, $msg);

      if ($validator->fails()) {
         return redirect()->back()
            ->withErrors($validator)
            ->withInput();
      } else {

         $post->comment()->create(['user_id' => Auth::user()->id, 'title' => $request->title, 'content' => $request->content,]);
         return back();
      }
   }
   public function cookingComment(CookingRecipe $cooking, Request $request)
   {
      $rules = [
         'title' => 'required | min:4',
         'content' => 'required | min: 4',
      ];

      $msg = [
         'required' => ':attribute không được bỏ trống.',
         'min' => ':attribute quá ngắn',
      ];

      $validator = Validator::make($request->all(), $rules, $msg);

      if ($validator->fails()) {
         return redirect()->back()
            ->withErrors($validator)
            ->withInput();
      } else {


         $cooking->comment()->create(['user_id' => Auth::user()->id, 'title' => $request->title, 'content' => $request->content,]);
         return back();
      }
   }
   public function mealbookComment(MealBook $mealbook, Request $request)
   {

      $rules = [
         'title' => 'required | min:4',
         'content' => 'required | min: 4',
      ];

      $msg = [
         'required' => ':attribute không được bỏ trống.',
         'min' => ':attribute quá ngắn',
      ];

      $validator = Validator::make($request->all(), $rules, $msg);

      if ($validator->fails()) {
         return redirect()->back()
            ->withErrors($validator)
            ->withInput();
      } else {

         $mealbook->comment()->create(['user_id' => Auth::user()->id, 'title' => $request->title, 'content' => $request->content,]);
         return back();
      }
   }
   public function delete($id)
   {
      $comment = Comment::findOrFail($id);
      $comment->delete();
      return back();
   }
}
