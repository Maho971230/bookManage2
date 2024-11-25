<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容確認</title>
</head>
<body>
    <h1>この内容で登録してもよろしいですか？</h1>
    <form action="/store" method="post">
        @csrf
        <input type="hidden" name="id" value={{$record->id}}><br>
            ISBN    {{$record->isbn}}
            書籍名  {{$record->title}}
            著者名  {{$author}}
            出版社名{{$publisher}}
            価格    {{$price}}
            <input type="submit" value="登録">
            <a href="/create">前のページに戻る</a>
     </form>
</body>
</html>