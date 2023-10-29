<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <small>{{ $post->user->name }}</small>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <h2 class='artist'>{{ $post->artist }}</h2>
        <div class='content'>
            <div class='content_post'>
                <p class='body'>{{ $post->body }}</p>
            </div>
        </div>
        <div class='edit'>
            <a href="/posts/{{ $post->id }}/edit">edit</a>
        </div>
        <div class='comment'>
            <a href="/comments/create/{{$post->id}}">コメントする</a>
        </div>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>