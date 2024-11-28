<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了画面</title>
</head>
<body>
    <div class="container mt-5">
        <h1>登録完了</h1>
        <p>以下の書籍が登録されました:</p>
        <ul>
            <li>ISBN: {{ $data['isbn'] }}</li>
            <li>書籍名: {{ $data['title'] }}</li>
            <li>著者名: {{ $data['writer'] }}</li>
            <li>出版社: {{ $data['publisher'] }}</li>
            <li>価格: {{ $data['price'] }}</li>
        </ul>
        <a href="{{ route('create') }}">新しい書籍を登録</a>
    </div>
</body>
</html>
