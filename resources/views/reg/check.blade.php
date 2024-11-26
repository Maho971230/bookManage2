<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容確認</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <h1>この内容で登録してもよろしいですか？</h1>

    <form action="/store" method="post">
        @csrf
        <input type="hidden" name="id" value={{$data->id}}><br>
        <table class="table">
            <tr><th>ISBN</th><th>書籍名</th><th>著者名</th><th>出版社名</th><th>価格</th></tr>    
            <tr>
                <th>{{$data->isbn}}</th>
                <th>{{$data->title}}</th>
                <th>{{$data->author}}</th>
                <th>{{$data->publisher}}</th>
                <th>{{$data->price}}</th>
            </tr>  
        </table>
        <input type="submit" value="登録">
        <a href="/create">前のページに戻る</a>
     </form>
</body>
