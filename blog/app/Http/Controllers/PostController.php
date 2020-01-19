<?php

namespace App\Http\Controllers;

use App\Post;
use App\Taggable;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();

        return view('posts.index',compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['user_id'] = $request->user()->id;

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $tags = Tag::all();

        return view('posts.edit',compact('posts', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $requestData = $request->all();
        $posts = Post::find($id);

        $posts->update($requestData);
        $posts->tags()->sync($request->tags);

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}
