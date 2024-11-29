<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>検索結果</title>
    <!-- CSSファイルへのリンク -->
    <link rel="stylesheet" href="/assets/css/searchList.css">
    {{-- BootStrapから引用 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>

<body>
    <div class="logout-container">
        <a href="/top" class="btn btn-success">Topページに戻る</a>
    </div>
    <div class="appTitle">
        <h1>書籍管理システム</h1>
    </div>
    <div class="subTitle">
        <h2>検索結果</h2>
    </div>
    @if($results->isEmpty())
        <p>該当する書籍はありません。</p>
    @else
        @csrf
            <div class="table">
                <table class="table table-bordered border-success">
                    <thead>
                        {{-- 目次 --}}
                        <tr class="table-active">
                            <th scope="col">番号</th>
                            <th scope="col">書籍名</th>
                            <th scope="col">著書名</th>
                            <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $book)
                            {{-- 中身 --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$book->title}}</td>
                                <td>{{$book->writer}}</td>
                                <td><a href="{{route('book',$book->id)}}" class="btn btn-outline-success">詳細</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    @endif
</body>
</html>
