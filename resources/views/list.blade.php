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
        <thead>
            <tr>
                <th scope="col">番号</th>
                <th scope="col">書籍名</th>
                <th scope="col">著書名</th>
                <th scope="col">詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{$record->title}}</td>
                    <td>{{$record->writer}}</td>
                    <td>{{$record->publisher}}</td>
                    <td><a href="{{route('book',$record->id)}}" class="btn btn-primary">詳細</a></td>
                </tr>
            @endforeach
        <tbody>
    </table>
</body>

</html>
