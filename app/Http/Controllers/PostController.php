<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Validator;
use App\Post;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Post::latest()->paginate(10);
        $recent = Post::paginate(5);
        return view('frontend.post.index',compact('item','recent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        dd($request);
        $rules = [
    		'title' => 'required | min:4|unique:posts',
    		'image' => 'required | image',
    		'content' => 'required | min:4'
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
		    'min' => ':attribute quá ngắn mời nhập dài hơn.',
            'image.image' => ':attribute không đúng định dạng',
		    'title.unique' => ':attribute đã có, mời ghi nội dung khác',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);       
    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $fileName = null;

            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./images/', $fileName);    
            }
            Post::create([
                'user_id' => Auth::user()->id,
                'title'=>$request->title,
                'image'=> './images/'.$fileName,
                'content'=> $request->content
            ]);
            return redirect()->route('index')->with('success',"You question has been submitted");
        
        
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
        $recent = Post::latest()->paginate(5);
       $post = Post::find($id);

       return view('page.blog',compact('post','recent'));
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
        //
    }
}
