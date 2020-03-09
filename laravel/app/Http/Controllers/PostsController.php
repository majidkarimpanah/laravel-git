<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent2;
use App\Http\Requests\CreatePostRequest;
use App\Listeners\PostViewCount;
use App\Post;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
      //  echo asset('storage/download (3).jpg');
        $posts = Post::all();
        $posts[0];
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
       // if ($file=$request->file('file')){
         //   $filename=$file->getClientOriginalName();
          //  $file->store('public/images');
           // $file->move('images',$filename);
           // $post->path=$filename;
       // }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = 1;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        event(new PostViewEvent2($post));
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findorfail($id);
        $user=Auth::user();
        if ($user->can('update',$post)){
            return view('posts.edit', compact('post'));
        }else{
            return 'شما به این صفحه دسترسی ندارید';
        }

       /* if ($user->can('update',$post)){
            return view('posts.edit', compact('post'));
        }else{
            return 'شما به این صفحه دسترسی ندارید';
        }*/

       /* if (Gate::allows('edit-post',$post)){
            $post = Post::findorfail($id);
            return view('posts.edit', compact('post'));
        }else{
            return 'شما به این صفحه دسترسی ندارید';
        }*/

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect('posts');

    }


}
