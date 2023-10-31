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
        <form action="/comments/{{$post->id}}", method="POST">
            @csrf
            <div class="comment">
                <h2>Comments</h2>
                <textarea name="comments[comment]" placeholder="コメント" >{{ old('comment.comment')}}</textarea>
                <p class="comment_error" style="color:red">{{$errors->first('comment.comment') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>