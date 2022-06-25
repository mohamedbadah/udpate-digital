<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);
        $i = 1;
        $current = $posts->currentPage() - 1;
        return view('dashboard.post.index', compact('posts', 'i', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'image|max:2048|mimes:png,jpg'
        ]);
        if ($validator) {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $ex  = $request->file('img');
            $new_image=" ";
            if($ex!=null){
                $ex = $request->file('img')->getClientOriginalExtension();
                $new_image = 'post_' . time() . '_' . '.' . $ex;
            $request->file('img')->move(public_path('upload/posts'), $new_image); 
            }           
            $new_image ?$post->image = $new_image:$new_image=$request->file('img');
            $post->created_by = Auth()->user()->name;
            $post->user_id = Auth()->user()->id;
            $post->category_id = $request->category;
            $post->save();
            session()->flash('sucess','add posted');
            return redirect()->route('posts.index')->with('success', 'posts created successfully')->with('type', 'success');
        }
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
        $categories = Category::all();
        return view('dashboard.post.edit', compact('post', 'categories'));
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
        $validation = $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required|string',
            'img' => 'image|max:2048|mimes:png,jpg',
        ]);
        if ($validation) {
            $post->title = $request->title;
            $post->content = $request->content;
            if ($request->hasFile('img')) {
                $ex = $request->file('img')->getClientOriginalExtension();
                $new_image = 'post_' . time() . '_' . '.' . $ex;
                Storage::disk('upload')->delete('posts/' . $post->image);
                $request->file('img')->move(public_path('upload/posts'), $new_image);
                $post->image = $new_image;
            }
            $post->created_by = Auth()->user()->name;
            $post->user_id = Auth()->user()->id;
            $post->category_id = $request->category;
            $post->save();
            return redirect()->route('posts.index')->with('success', 'posts update successfully')->with('type', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $isDeleted = $post->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success', 'text' => 'post Deleted Successfuly', 'icon' => 'success'
            ], Response::HTTP_OK);
        } else {

            return response()->json([
                'title' => 'Failde', 'text' => 'post Delete Failde', 'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
