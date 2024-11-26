<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>レビュー削除画面</title>
</head>

<body>
  <h1>このレビューを削除しますか？</h1>
  <form action="{{ route('delete') }}" method="post">
    @csrf
    <h1>確認内容</h1>
    <input type="hidden" name="id" value="{{$review->id}}">
    <br />
    <p>書籍名:{{ $review->book->title }}</p>
    <br />
    レビュー内容:
    <p>{{ old('content', $review->content) }}</p>
    <br />
    評価:
    <p>{{ old('rating', $review->rating) }}</p>
    <br />
    <input type="submit" value="削除" class="btn btn-primary" />
  </form>
  <a href="{{ route('top') }}">戻る</a>
</body>

</html>