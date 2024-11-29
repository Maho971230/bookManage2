<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規レビュー確認</title>
    {{-- bootstrapの読み込み --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    {{-- FontAwesome for stars　読み込み --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <p>レビュー新規登録</p>
    <h1>以下の内容で登録してもよろしいですか</h1>
    <form action="{{route('reviewStore')}}" method="post">
            @csrf
            <h1>確認内容</h1>
            <input type="hidden" name="id" value="{{$review->id}}">
            <br>
            <p>書籍名:{{ $review -> book -> title}}</p>
            <br>
            レビュー内容:
            <p>{{ old('content', $review->content) }}</p>
            <br>
            評価:
            <div class="star-rating">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star {{ $review->rating >= $i ? 'text-warning' : 'text-muted' }}"></i>
                @endfor
            </div>      
            <br>
            
            <input type="submit" value="登録" class="btn-primary">
    </form>
    <a href="{{route('top')}}" class="btn btn-secondary">戻る</a>
</body>
</html>
