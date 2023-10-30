<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1><strong>Blog Name</strong></h1>
        <button class="btn btn--primary"><a href="/posts/create">新規投稿</a></button>
        <table>
            <tr>
                <th>投稿者</th><th>曲名</th><th>アーティスト名</th><th>感想</th><th></th><th></th>
            </tr>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <tr>
                <td><small>{{ $post->user->name }}</small></td>
                <td><a href="/posts/{{ $post->id}}"><h2 class='title'>{{ $post->title }}</h2></a></td>
                <td><h2 class='artist'>{{ $post->artist }}</h2></td>
                <td><p class='body'>{{ $post->body }}</p></td>
                <td><a href="/posts/{{ $post->id}}">詳細</a></td>
                <td>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
                </td>
                </tr>
            </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links()}}</div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
    <p>ログインユーザー：{{ Auth::user()->name }}</p>
    </x-app-layout>
</html>