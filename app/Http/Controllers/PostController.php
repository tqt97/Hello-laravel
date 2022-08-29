<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author', 'category')
            ->when(request('search'), function ($query) {
                return $query->where('title', 'like', '%' . request('search') . '%');
            })
            ->when(request('user_id'), function ($query) {
                $query->where('user_id', request('user_id'));
            })
            ->when(request('category_id'), function ($query) {
                $query->where('category_id', request('category_id'));
            })
            ->latest()->paginate(10);
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.index', compact('posts', 'categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('posts', $filename, 'public');

            $image = $filename;
        } else {
            $image = 'default.jpg';
        }
        $data = [
            'title' => $request->title,
            'slug' => $request->slug ? $request->slug : Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'active' => $request->active ? true : false,
            'feature' => $request->feature ? true : false,
            'image' => $image
        ];

        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return view('admin.post.show', $post);
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
        return view('admin.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->file('image')) {
            // unlink old image
            // todo ...
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('posts', $filename, 'public');

            $image = $filename;
        } else {
            $image = $post->image;
        }

        $data = [
            'title' => $request->title,
            'slug' => $request->slug ? $request->slug : Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'active' => $request->active ? true : false,
            'feature' => $request->feature ? true : false,
            'image' => $image
        ];

        $post->update($data);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully !');
    }
}
