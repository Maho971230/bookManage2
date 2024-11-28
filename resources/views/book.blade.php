<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍詳細</title>
</head>
<body>
    <h1>書籍詳細情報</h1>
    <a href="/top">トップページに戻る</a><br>
    <div class="container">
        @csrf
        <p>書籍名:{{$book->title}}</p>
        <p>著者名:{{$book->writer}}</p>
        <p>価格:¥{{ $book->price }}</p>
        <p>ISBN:{{ $book->isbn }}</p>

        @if($reviews->isNotEmpty())
            @foreach($reviews as $review)
                <p>レビュー</p><form action="{{route('reviewCreate',$review->book_id)}}" method="post"><input type="submit" value="新規投稿">@csrf</form>
                <p>レビュー: {{ $review->content }}</p><p>点数: {{ $review->rating }}</p>
                <form action="/edit" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$review->id}}">
                    <input type="submit" value="更新">
                </form>
                <form action="/erase" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$review->id}}">
                    <input type="submit" value="削除">
                </form>
            @endforeach
        @else
            <p>レビューはまだありません。</p>
        @endif
    </div>

</body>
</html>
