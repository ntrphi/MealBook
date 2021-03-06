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
      
        $recent = Post::paginate(5);
        if (\Request::is('postAll')) {
            $item = Post::latest()->paginate(10);
        return view('frontend.post.index',compact('item','recent'));
        }else{
            $item = Post::withTrashed()->latest()->paginate(10);
            return view('admin.post.list',compact('item'));
        }
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
       $post = Post::find($id);
       return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
   

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./images/', $fileName);    
        }
        $post = Post::find($request->id);
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->image = './images/'.$fileName;
        $post->content =  $request->content;
        $post->save();
    
        return redirect()->route('list-post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post =  Post::withTrashed()->find($id);

        if (!$post->trashed()) {
            $post->delete();
            return redirect()->route('list-post');          
        }
        $post->forceDelete();
        return redirect()->route('list-post');
    }
    public function restore($id){
  
        $post = Post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('list-post');
    }

}
