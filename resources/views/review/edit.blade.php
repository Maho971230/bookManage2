<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レビュー編集画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
<form action="/repost" method="post"> <!-- 修正先のルートに対応 -->
    @csrf
    @if(isset($record))
    <input type="hidden" name="id" value="{{ $record->id }}">
    <br>
    レビュー内容<textarea name="content">{{ $record->content }}</textarea>
    <br>
    評価<input type="text" name="rating" value="{{ $record->rating }}">
    <br>
    <input type="submit" value="修正" class="btn btn-primary">
    @else
    <p>レビュー情報が見つかりません。</p>
    @endif
			</form>
    <a href="{{route('top')}}" class="btn btn-secondary">戻る</a>
</body>

</html>
