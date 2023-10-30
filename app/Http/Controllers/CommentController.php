<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function create(Comment $comment, Post $post)
    {
        return view('comments.create')->with(['comments' => $comment->get(), 'post' => $post]);
    }

   public function store(Post $post, Request $request)
   {
       $comment = new Comment();
       $input = $request->comments;
       $input['post_id'] = $post->id;
       $input['user_id'] = Auth::user()->id;
       $comment->fill($input)->save();

       return redirect('/');
   }



    public function edit(Post $post, Comment $comment)
    {
        return view('comments/edit')->with(['comment' => $comment, 'post' => $post]);
    }
    
    
    public function update(CommentRequest $request, Post $post, Comment $comment)
    {
        $input_comment = $request['comment'];
        $input_comment += ['user_id' => $request->user()->id];
        $comment ->fill($input_comment)->save();
        return redirect('/');
    }
    
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }
}

