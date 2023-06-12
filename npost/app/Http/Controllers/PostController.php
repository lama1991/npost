<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts=Post::all();
        return view('showallPosts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('add_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $post=Post::create(['title'=>$request['title'],
        'content'=>$request['content'],
        'user_id'=>Auth::user()->id
    ]);
         return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        //soft delete
        $post->delete();
        return redirect('posts');

    }
    public function myPosts()
    {
        $user=Auth::user();
        $posts=$user->posts;
        return view('showallPosts',compact('posts'));
    }
    public function trashed()
    {
        $r=array();
        $roles=Auth::user()->roles;
       foreach($roles as $role)
       {
           $r[]= $role->name;
       }
        if(!in_array('admin',$r))
        {
            $curr_id=Auth::user()->id;
            $tposts=Post::onlyTrashed() ->where('user_id', $curr_id)->get();
        }
        else
        {
            $tposts=Post::onlyTrashed()->get();
        }
        
        return view('trashed',compact('tposts'));
    }
    public function restore($id)
    {
       $post= Post::withTrashed()
        ->where('id',$id)
        ->restore();
        return redirect('posts');

    }
   
    public function  forceDelete($id)
    {
       $post= Post::withTrashed()
        ->where('id',$id)
        ->forceDelete();
        return redirect('posts');

    }
}
