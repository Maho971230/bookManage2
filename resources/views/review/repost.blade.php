<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レビュー確認</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <p>レビュー確認画面</p>
    <form action="{{route('update')}}" method="post">
        @csrf
        <h1>確認内容</h1>
        <input type="hidden" name="id" value={{$record->}}>
        <br>
        <p>書籍名</p>
        <br>
        レビュ－内容[{{$record->content}}]
        <br>
        評価[{{$record->rating}}]
        <br>
        <input type="submit" value="登録" class="btn btn-primary">
    </form>
    <a href="{{route('top')}}" class="btn btn-secondary">戻る</a>
</body>
</html>
