<?php

namespace App\Http\Controllers;

use App\DishType;
use Illuminate\Http\Request;

class DishtypeController extends Controller
{
    public function delete($id)
    {
        $dishtype = DishType::find($id);
        $dishtype->delete();
        return redirect()->route('list-dishtype');
    }
    public function add(Request $request)
    {
        $dishtype_name = $request->name;
        $dishtype = new DishType;
        $dishtype->name = $dishtype_name;
        $dishtype->save();
        return redirect()->route('list-dishtype');
    }
}
