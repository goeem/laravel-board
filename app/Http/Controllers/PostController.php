<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Interest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'interest'])->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $interest_id = $request->query('interest_id');
        $interests = Interest::all(); 
        return view('posts.create', compact('interest_id', 'interests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'interest_id' => 'required|exists:interests,id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'interest_id' => $request->interest_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('interests.show', $request->interest_id)->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with(['user', 'interest'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (!(auth()->id() === $post->user_id)) {
            return response()->json(['message' => 'Nav autorizets lietotajs'], 403);
        }
        
        $interests = Interest::all();
        return view('posts.edit', compact('post', 'interests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'interest_id' => 'required|exists:interests,id',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'interest_id' => $request->interest_id,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('interests.show', $post->interest_id)->with('success', 'Post deleted successfully!');
    }
}

