<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <h1>つぶやきアプリ</h1>
    @auth
    <div>
        <p>投稿フォーム</p>
        @if(session('feedback.success'))
            <p style="color: greenyellow">{{session('feedback.success')}}</p>
        @endif
        <form action="{{ route('tweet.create') }}" method="post">
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140字まで</span>
        <textarea name="tweet" id="tweet-content" placeholder="つぶやきを入力" cols="30" rows="10"></textarea>
        @error('tweet')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <button type="submit">投稿</button>
        </form>
    </div>
    @endauth
    <h3>つぶやき一覧</h3>
    @foreach($tweets as $tweet)
    <details>
        <summary>{{$tweet->content}} by {{$tweet->user->name}}</summary>
        @if(\Illuminate\Support\Facades\Auth::id() == $tweet->user_id)
        <div style="display: flex">
            <a href="{{route('tweet.update.index',['tweetId'=>$tweet->id])}}">編集</a>
            <form action="{{route('tweet.delete',['tweetId'=>$tweet->id])}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit">削除</button>
            </form>
        </div>            
        @else
            編集できません
        @endif
    </details>
    @endforeach
</body>
</html>