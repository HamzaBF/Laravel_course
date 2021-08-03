<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('posts.index',[
            'posts' => Post::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',[
            'post' => Post::find($id)
        ]);
    }


    /**
     * Create a specified resource.
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a specified resource.
     */
    public function store(StorePost $request)
    {
        $data = $request->only(['title','content']);
        $data['slug'] = Str::slug($data['title'],'-');
        $data['active'] = false;

        // $post = new Post();
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        
        // $post->slug = Str::slug($post->title,'-');
        // $post->active = false;
        // $post->save();

        $post = Post::create($data);

        $request->session()->flash('status','Post was created');

        return redirect()->route('posts.index'); 
    }

    /**
     * Edit a specified resource.
     
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit',[
            'post'=>$post
        ]);
       
    }

    /**
     * Update a specified resource.
     
     */
    public function update(StorePost $request,$id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        
        $post->slug = Str::slug($post->title,'-');
        $post->active = false;
        $post->save();

        $request->session()->flash('status','Post was updated');

        return redirect()->route('posts.index'); 
       
    }


    /**
     * Edit a specified resource.
     
     */
    public function destroy(StorePost $request,$id)
    {
        Post::destroy($id);

        $request->session()->flash('status','Post was Deleted');

        return redirect()->route('posts.index'); 

    }

}
