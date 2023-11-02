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
        <h1>Blog Name</h1>
        <form action="/comments/{{ $comment->id }}", method="POST">
            @csrf
            @method('PUT')
            <div class="comment">
                <h2>コメント</h2>
                <textarea name="comment[comment]" placeholder="コメント">{{ $comment->comment }}</textarea>
                <p class="body_error" style="color:red">{{$errors->first('comment.comment') }}</p>
            </div>
            <input type="submit" value="更新">
        </form>
        <div class='footer'>
            <a href="/posts/{{$post->id}}">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>