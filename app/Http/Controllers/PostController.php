<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Comment;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $query = Post::query();
            if ($search = request('search')) {
                $query->where('title', 'LIKE', "%{$search}%")->orWhere('artist','LIKE',"%{$search}%")->orWhere('body','LIKE',"%{$search}%");
            }
        return view('posts/index')->with(['posts' => $post->getPagenateByLimit(5)]); 
    }
    
    public function show(Comment $comment, Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
        return view('posts/show')->with(['comments' => $comment ->get()]);
    }
    
    public function create(Comment $comment, Post $post)
    {
        return view('posts.create')->with(['comments' => $comment->get()]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post ->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post ->fill($input_post)->save();
        return redirect('/posts/'. $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
