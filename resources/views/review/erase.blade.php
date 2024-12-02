<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>レビュー削除画面</title>
  <link rel="stylesheet" href="/assets/css/erase.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
  <div class="appTitle">
    <h1>書籍管理システム</h1>
  </div>
  <div class="subTitle">
    <h2>レビュー削除</h2>
  </div>
  <div class="backToTop-container">
    <a href="/top" class="btn btn-success">Topページに戻る</a>
  </div>
  
  <p>このレビューを削除しますか？</p>
  <form action="{{ route('delete') }}" method="post">
    @csrf
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
    <input type="submit" value="削除" class="btn btn-outline-success" />
  </form>
  <a href="{{ route('top') }}" class="btn btn-success">戻る</a>
</body>

</html>
