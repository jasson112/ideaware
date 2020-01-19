<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
            'name' => 'required'
        ]);
        $requestData = $request->all();

        Tag::create($requestData);

        return redirect()->route('tags.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tags
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::find($id);
        return view('tags.show',compact('tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('tags.edit',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $requestData = $request->all();
        $posts = Tag::find($id);
        $posts->update($requestData);

        return redirect()->route('tags.index')
            ->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Tag::find($id);
        $posts->delete();

        return redirect()->route('tags.index')
            ->with('success','Post deleted successfully');
    }
}
