<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧表示</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <h1>全件表示</h1>
    <a href="/top">Topページに戻る</a>
    <table class="table">
        @csrf
        <tr>
            <th>書籍名</th>
            <th>著者名</th>
            <th>出版社名</th>
            <th>価格</th>
            <th>ISBN</th>
            <th>レビュー件数</th>
            <th>平均得点</th>
        </tr>
        @foreach($records as $record)
        <tr>
            <td><a href="/book">{{$record->title}}</a></td>
            <td>{{$record->writer}}</td>
            <td>{{$record->publisher}}</td>
            <td>{{$record->price}}</td>
            <td>{{$record->isbn}}</td>
            <td>{{$record->countReview}}</td>
            <td>{{$record->avgPoint}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
