<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
        <x-app-layout>
    <body class="antialiased">
        <small>ユーザー：{{ $post->user->name }}</small>
        <h1 class="title">
            タイトル：{{ $post->title }}
        </h1>
        <h2 class='artist'>アーティスト：{{ $post->artist }}</h2>
        <div class='content'>
            <div class='content_post'>
                感想：<p class='body'>{{ $post->body }}</p>
            </div>
        </div>
        <div class='edit'>
            <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
        <div class='comment'>
            @foreach ($post->comments as $comment)
            <small>{{ $comment->user->name }}</small>
                <div class='comment'>
                    <p class='body'>{{ $comment->comment }}</p>
                </div>
        <div class='edit'>
            <a href="/comments/{{$comment->id}}/edit">コメント編集</a>
        </div>
        
                <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteComment({{ $comment->id }})">コメント削除</button> 
                </form>
            @endforeach
            <a href="/comments/create/{{$post->id}}">コメントする</a>
        </div>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
        <script>
            function deleteComment(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
        </x-app-layout>
</html>