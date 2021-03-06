<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\User;

class UserController extends Controller
{
    public function get($id)
    {
        return view('user/list', compact('id'));
    }

    public function listuser()
    {
        $list = User::all();
        foreach ($list as $key => $value) {
            echo $value;
        }
    }
    public function delete($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user->trashed()) {
            $user->forceDelete();
            return redirect()->route('list-author');
        }
        $user->delete();
        return redirect()->route('list-author');
    }
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('list-author');
    }
    public function UpOrDowngrade($id)
    {
        $user = User::find($id);
        if ($user->role->name == "Member") {
            $user->role_id = 1;
        }
        $user->save();
        return redirect()->route('list-author');
    }
    public function update(Request $request)
    {
        if (Auth::user()->id == $request->input('id')) {
            $user = User::find($request->input('id'));
        } else redirect()->route('error');
        $user->name = $request->input('name');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->email = $request->input('email');
        $user->tel = $request->input('tel');
        $user->save();
        return redirect()->route('userpage', $request->input('id'));
    }
}
