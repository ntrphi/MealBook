<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IngredientSample;
use Validator;

class IngredientSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | min:1|unique:ingredient_samples',
            
         ];
   
         $msg = [
            'required' => ':attribute không được bỏ trống.',
            'min' => 'bạn chắc chắn có tên này',
            'name.unique' => ':attribute đã có, mời ghi nội dung khác',
         ];
   
         $validator = Validator::make($request->all(), $rules, $msg);
   
         if ($validator->fails()) {
            return redirect()->back()
               ->withErrors($validator)
               ->withInput();
         } else {
                $data = new IngredientSample;
                $data->name = $request->name;
                $data->save();
                return redirect()->route('list.ingredient');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = IngredientSample::findOrFail($id);
        $data->delete();
        return redirect()->route('list.ingredient');
    }
}
