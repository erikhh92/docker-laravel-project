<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\File;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {

        $posts = Auth::user()->posts()->paginate(5);

        if(request()->page > $posts->lastPage()) {
            return redirect($posts->url($posts->lastPage()));
        }

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);

        /*$post = Post::all();
        if($post->count()){
            $data = $post->toArray();
        }
        $first = $post->first()->id;
        $last = $post->last()->id;

        $count = $post->count();

        return $post;*/

    }

    public function createVeeValidate()
    {
        return Inertia::render('Posts/CreateVeeValidate');
    }

    public function createVuelidate()
    {
        return Inertia::render('Posts/CreateVuelidate');
    }

    public function store(PostRequest $request)
    {

        Auth::user()->posts()->create($request->all());

        return redirect()->route('posts.index')->with('status', ['type' => 'success', 'message' => __('post stored successfully')]);
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('posts.index')->with('status', ['type' => 'success', 'message' => __('post updated successfully')]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('status', ['type' => 'success', 'message' => __('post deleted successfully')]);
    }
}
