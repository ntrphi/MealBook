<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CookingRecipe;
use App\DishType;
use App\Ingredient;
use App\IngredientDetail;
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
    		'name' => 'required | min:4|max:30|unique:cooking_recipes',
            'avatar' => 'required | image',           
            'short_desc' => 'required | min:4',
            'recipe'=>'required|min:4',
            'ingredient'=>'required|array',
            'amount.'=>'required|array',
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
		    'min' => ':attribute quá ngắn mời nhập dài hơn.',
		    'max' => ':attribute có vẻ tên hơi dài bạn rút gọn bớt.',
            'avatar.image' => ':attribute không đúng định dạng',
		    'name.unique' => ':attribute đã có, mời ghi nội dung khác',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);       
    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {

        $ingredient = $_POST['ingredient'];
        $amount = $_POST['amount'];
      
        $fileName = null;
            if (request()->hasFile('avatar')) {
                $file = request()->file('avatar');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./images/', $fileName);
            }
            $cooking = new CookingRecipe;
            $cooking->name = $request->name;
            $cooking->dish_type_id = $request->dish_type_id;
            $cooking->author_id = Auth::user()->id;
            $cooking->avatar = './images/'.$fileName;
            $cooking->recipe = $request->recipe;
            $cooking->short_desc = $request->short_desc;
            $cooking->save();
            
            for($i=0;$i<count($ingredient);$i++){
                $ingredients = $ingredient[$i];
                $amounts = $amount[$i];
                $cooking->ingredientDetail()->create(['ingredient'=>$ingredients,'amount'=>$amounts]);
            }
        
            return redirect()->route('cookingAll');
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

    public function destroy($id)
    {
        $cooking = CookingRecipe::withTrashed()->find($id);
   
        if(!$cooking->trashed()){
            $cooking->delete();
            return redirect()->route('manageCookingRecipes');
           
        }
        $cooking->forceDelete();
        return redirect()->route('manageCookingRecipes');
  

    }

    public function restore($id){
  
        $cooking = CookingRecipe::withTrashed()->find($id);
        $cooking->restore();
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
        $rules = [
    		'name' => 'required | min:4|max:30|unique:cooking_recipes',
            'avatar' => 'required | image',           
            'short_desc' => 'required | min:4',
            'recipe'=>'required|min:4',
            'ingredient'=>'required|array',
            'amount.'=>'required|array',
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
		    'min' => ':attribute quá ngắn mời nhập dài hơn.',
		    'max' => ':attribute có vẻ tên hơi dài bạn rút gọn bớt.',
            'avatar.image' => ':attribute không đúng định dạng',
		    'name.unique' => ':attribute đã có, mời ghi nội dung khác',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);       
    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
        $ingredient = $_POST['ingredient'];
        $amount = $_POST['amount'];
        $idDetail = $_POST['idDetail'];
        $fileName = null;
            if (request()->hasFile('avatar')) {
                $file = request()->file('avatar');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./images/', $fileName);
            }
            $cooking = CookingRecipe::find($request->id);
            $cooking->name = $request->name;
            $cooking->dish_type_id = $request->dish_type_id;
            $cooking->author_id = Auth::user()->id;
            $cooking->avatar = './images/'.$fileName;
            $cooking->recipe = $request->recipe;
            $cooking->short_desc = $request->short_desc;
            $cooking->save();
          
         
            for($i=0;$i<count($idDetail);$i++){
                
                $detail = IngredientDetail::find($idDetail[$i]);
                $detail->ingredient = $ingredient[$i];
                $detail->amount = $amount[$i];
                $detail->save();
                
                //$cooking->ingredientDetail()->update(['ingredient'=>$ingredient[$i],'amount'=>$amount[$i]]);
            }
         
        
            return redirect()->route('manageCookingRecipes');
        }
    }

    public function getAllDishTypes()
    {
        return DishType::all();
    }
}
