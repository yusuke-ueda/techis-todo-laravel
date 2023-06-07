<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきを編集する</h1>
    <div>
        <a href="{{route('tweet.index')}}">< 戻る</a>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color: greenyellow">{{session('feedback.success')}}</p>
        @endif
        <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
        @method('PUT')
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140字まで</span>
        <textarea name="tweet" id="tweet-content" placeholder="つぶやきを入力" cols="30" rows="10">{{$tweet->content}}</textarea>
        @error('tweet')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <button type="submit">編集</button>
        </form>
    </div>
</body>
</html>