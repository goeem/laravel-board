<?php

namespace App\Http\Controllers;
use App\Models\Interest;
use Illuminate\Http\Request;



class InterestController extends Controller
{
    public function index()
{
    $interests = Interest::all();
    return view('interests.index', compact('interests'));
}
    public function show($id)
{
    $interest = Interest::findOrFail($id);
    $posts = $interest->posts;

    if (request()->ajax()) {
        return view('posts.partials.posts', compact('posts'))->render();
    }

    return view('interests.show', compact('interest', 'posts'));
}
}
