<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Http\Requests\CookingRequest;
use Illuminate\Http\Request;
use App\CookingRecipe;
use App\DishType;


class CookingRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listRecipes = CookingRecipe::all();
        $recent = CookingRecipe::latest()->paginate(5);
        //return $listRecipes;
        if (\Request::is('manageCookingRecipes')) {
            return view('admin.cookingRecipes.list', compact('listRecipes'));
        } else {
            return view('page.cooking', compact('listRecipes', 'recent'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishType = DishType::all();

        return view('frontend.cooking.add', compact('dishType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CookingRequest $request)
    {
        $fileName = null;
        if (request()->hasFile('avatar')) {
            $file = request()->file('avatar');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./avatar/', $fileName);
        }
        // dd($request->user()->id);
        CookingRecipe::create([
            'dish_type_id' => $request->dish_type_id,
            'author_id' => $request->user()->id,
            'name' => $request->name,
            'avatar' => $fileName,
            'ingredient' => $request->ingredient,
            'recipe' => $request->recipe
        ]);

        return redirect()->route('index')->with('success', "You question has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cooking =  CookingRecipe::find($id);
        $recent = CookingRecipe::latest()->paginate(5);
        return view('page.blog-cooking', compact('cooking', 'recent'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        CookingRecipe::find($id)->delete();
        return redirect()->route('manageCookingRecipes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cooking_recipe = CookingRecipe::find($id);
        $dish_types = DishType::all();
        if ($this->authorize('update', $cooking_recipe)) {
            return view('admin.cookingRecipes.edit', ['recipe' => $cooking_recipe, 'dish_types' => $dish_types]);
        } else {
            return redirect()->route('manageCookingRecipes');
        }
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $fileName = null;
        if ($request->hasFile('avatar')) {
            $file = request()->file('avatar');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./avatar/', $fileName);
            $fileName = './avatar/'.$fileName;
        }
        $cooking_recipe = CookingRecipe::find($id);
        $cooking_recipe->name = $request->name;
        $cooking_recipe->ingredient = $request->input('ingredient');
        $cooking_recipe->recipe = $request->input('recipe');
        if ($fileName) {
            $cooking_recipe->avatar = $fileName;
        }

        $cooking_recipe->dish_type_id = $request->input('dish_type_id');
        $cooking_recipe->save();
        return redirect()->route('manageCookingRecipes');
    }
    public function getAllDishTypes()
    {
        return DishType::all();
    }
}
