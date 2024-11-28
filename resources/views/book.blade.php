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
        <p>{{$book->title}}</p>
        <p>{{$book->writer}}</p>
        <p>価格: ¥{{ $book->price }}</p>
        <p>ISBN: {{ $book->isbn }}</p>

        @if($reviews->isNotEmpty())
        @foreach($reviews as $review)
        <p>レビュー: {{ $review->content }}</p>
        @endforeach
        @else
        <p>レビューはまだありません。</p>
        @endif
    </div>

</body>
</html>
