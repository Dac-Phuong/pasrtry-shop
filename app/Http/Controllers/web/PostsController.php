<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return view('web.posts.index');
    }
    public function detail($id)
    {
        $item_posts = Posts::find($id);
        $posts_new = Posts::orderBy('created_at', 'desc')->limit(6)->get();
        return view('web.posts.detail', ['item_posts' => $item_posts, 'posts_new' => $posts_new]);
    }
} 
