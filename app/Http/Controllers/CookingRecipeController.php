<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CookingRecipe;
use App\DishType;
use App\Ingredient;
use Illuminate\Support\MessageBag;
use Validator;

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
        $first = CookingRecipe::first();
        //return $listRecipes;
        if (\Request::is('manageCookingRecipes')) {
            return view('admin.cookingRecipes.list', compact('listRecipes'));
        } else {
            return view('page.cooking', compact('recent','first'));
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
       // $sampleData = Ingredient::all();

        return view('frontend.cooking.add', compact('dishType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request){
        $data = Ingredient::select("name")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
        
    }
     
    public function store(Request $request)
    {
     
        $rules = [
    		'name' => 'required | min:4|unique:cooking_recipes',
            'avatar' => 'required | image',           
            'ingredient' => 'required | min:4',
            'recipe'=>'required|min:4',
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
		    'min' => ':attribute quá ngắn mời nhập dài hơn.',
            'avatar.image' => ':attribute không đúng định dạng',
		    'name.unique' => ':attribute đã có, mời ghi nội dung khác',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);       
    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $fileName = null;
            if (request()->hasFile('avatar')) {
                $file = request()->file('avatar');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./images/', $fileName);
            }
           
            CookingRecipe::create([
                'dish_type_id' => $request->dish_type_id,
                'author_id' => Auth::user()->id,
                'name' => $request->name,
                'avatar' => './images/'.$fileName,
                'ingredient' => $request->ingredient,
                'recipe' => $request->recipe
            ]);
            return redirect()->route('index')->with('success', "You question has been submitted");
        }
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
            $file->move('./images/', $fileName);
        }
        $cooking_recipe = CookingRecipe::find($id);
        $cooking_recipe->name = $request->name;
        $cooking_recipe->ingredient = $request->input('ingredient');
        $cooking_recipe->recipe = $request->input('recipe');
        if ($fileName) {
            $cooking_recipe->avatar = './images/'.$fileName;
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
