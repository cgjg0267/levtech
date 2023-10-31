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
        <table>
        <p>ユーザー：{{ $post->user->name }}</p>
        <h1 class="title">
            Title：{{ $post->title }}
        </h1>
        <h2 class='artist'>Artist：{{ $post->artist }}</h2>
        <div class='content'>
            <div class='content_post'>
            <p class='body'>感想：{{ $post->body }}</p>
            </div>
        </div>
        <div class='edit'>
            <a href="/posts/{{ $post->id }}/edit">[編集]</a>
        </div>
        <div class='comment'>
            @foreach ($post->comments as $comment)
            <tr>
            <td><small>{{ $comment->user->name }}</small></td>
                <td><div class='comment'>
                    <p class='body'>{{ $comment->comment }}</p>
                </div></td>
        <td><div class='edit'>
            <a href="/comments/{{$comment->id}}/edit">[コメント編集]</a>
        </div></td>
        
                <td><form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteComment({{ $comment->id }})">[コメント削除]</button> 
                </form></td>
                </tr>
            @endforeach
            <a href="/comments/create/{{$post->id}}">>コメントする</a>
        </div>
        </table>
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