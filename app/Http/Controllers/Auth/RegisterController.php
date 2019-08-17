<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tel' => ['required', 'numeric', 'min:6'],
            'image' => ['required', 'mimes:jpeg,jpg,png'],
            'term'=>['accepted']
        ], [
            'required' => ':attribute không được bỏ trống.',
            'password.min' => 'Password phải lớn hơn :min ký tự.',
            'password.string'=>'hhfhhjkn',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email bị trùng',
            'password.confirmed'=> 'Mật khẩu không trùng khớp', 
            'tel.numeric' => 'Sai định dạng',
            'tel.min' => 'Sô điện thoại phải lớn hơn :min ký tự.',
            'image.mines' => 'Sai định dạng',
            'accepted'=>'Terms of Service must be acceptance.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = $request->all(); 
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $fileName = null;
        if (request()->hasFile('image')) {

            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./images/', $fileName);
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tel' => $data['tel'],
            'role_id' => 2,
            'image' => './images/' . $fileName,

        ]);
        return redirect('admin/user');
    }
}
