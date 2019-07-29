<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin()
    {
    	if (Auth::check())
		{
		   return redirect()->route('dashbroad');
		}
    	return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	// $rules = [
    	// 	'email' => 'required | min : 4 | max : 25 ',
    	// 	'password' => 'required | min: 8'
    	// ];

    	// $msg = [
		//     'required' => ':attribute không được bỏ trống.',
		//     'password.min' => 'Password phải lớn hơn :min ký tự.',
		//     'email.min' => 'Username phải lớn hơn :min ký tự.',
		//     'email.max' => 'Username phải nhỏ hơn :max ký tự.',
		// ];
	
    	// $validator = Validator::make($request->all(), $rules , $msg);

    	// if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // } else {
        	$email = $request->input('email');
        	$password = $request->input('password');
        	
        	if( Auth::attempt(['email' => $email, 'password' => $password], $request->input('remember') ) ){

        		return redirect()->route('dashboard');

        	} else {

        		$msg = new MessageBag(['errlogin'=> 'Sai thông tin đăng nhập.']);
        		return redirect()->back()->withErrors($msg);
        	}
        // }
    }
    
    public function getLogout()
    {
        if( Auth::check() ) Auth::logout();
        return redirect()->route('login');
    }
}
