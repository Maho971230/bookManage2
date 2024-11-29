<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍詳細</title>
    <link rel="stylesheet" href="/assets/css/book.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    {{-- FontAwesome for stars　読み込み --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="appTitle">
        <h1>書籍管理システム</h1>
    </div>
    <div class="subTitle">
        <h2>書籍詳細情報</h2>
    </div>
    <div class="backToTop-container">
        <a href="/top" class="btn btn-success">Topページに戻る</a>
    </div>
    <div class="information">
        <table  align="center">
            @csrf
            <tr>
                <td colspan="6" rowspan="5"><img src="/img/book.png" class="bookImg" class="imgCell"></td>
                <td>　　　</td>
                <td>書籍名　</td>
                <td>{{$book->title}}</td>
            </tr>
            <tr>
                <td>　　　</td>
                <td>著者名　</td>
                <td>{{$book->writer}}</td>
            </tr>
            <tr>
                <td>　　　</td>
                <td>価格　</td>
                <td>¥{{ $book->price }}</td>
            </tr>
            <tr>
                <td>　　　</td>
                <td>ISBN　</td>
                <td>{{ $book->isbn }}</td>
            </tr>
            <tr class="imgCell">
                <td>　　　</td>
                <td>平均評価　</td>
                <td>{{ $averageRating }}</td>
            </tr>
            <tr>
                <td colspan="8" align="left" class="imgCell">レビュー　　　　　{{ $reviewCount }}件</td>
                <td align="right" class="imgCell">
                    @foreach($reviews as $review)
                        <form action="{{route('reviewCreate',$review->book_id)}}" method="post"><input type="submit" value="新規投稿" class="btn btn-outline-success">@csrf</form>
                    @endforeach
                    @if($reviews->isNotEmpty())                          
                </td>
            </tr>
            <tr>
                <td colspan="10" class="imgCell">
                    <div class="star-rating">
                        @foreach($reviews as $review)
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $review->rating  >= $i ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor</div><br>
                            　　　　　{{ $review->content }}
                            @if($review->employee_id === Auth::id())
                                <form action="/edit" method="post">
                                    @csrf
                                    <div class="update_button" align="right">
                                        <input type="hidden" name="id" value="{{$review->id}}">
                                        <input type="submit" value="更新" class="btn btn-outline-success">
                                    </div>
                                </form>
                                <form action="/erase" method="post">
                                    @csrf
                                    <div class="delete_button" align="right">
                                        <input type="hidden" name="id" value="{{$review->id}}" >
                                        <input type="submit" value="削除" class="btn btn-outline-success">
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    @else
                        <p>レビューはまだありません。</p>
                    @endif
                </td>
            </tr>
        </table>
    </div>

                
                <!-- 投稿者のみ編集と削除を表示 -->
                
</body>

</html>
