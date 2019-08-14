<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Point;
use App\MealBook;
use App\CookingRecipe;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $meal = MealBook::latest()->first();
        $mealHot = MealBook::latest()->paginate(5);
        $user = User::get();
        $user = $user->sortByDesc(function($u){
            return $u->point->sum('point');
        });
        $cookingFirst = CookingRecipe::first();
        $cookingWeek = CookingRecipe::paginate(4);
        $post = Post::latest()->paginate(3);
        return view('frontend.index',compact('meal','cookingWeek','user','post','mealHot','cookingFirst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('page.contact');
    }


    public function chef()
    {
        $chef = User::all();
        return view('page.chef',compact('chef'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
