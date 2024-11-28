<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍検索</title>
</head>
<body>
    <h1>書籍名検索</h1>
    <h2>書籍名(キーワード)を入力してください</h2><a href="/top">トップページに戻る</a><br>
    <form action="/searchList" method="post">
        @csrf
        <input type="hidden" name="type" value="title">
        <input type="text" name="word" required><input type="submit" value="検索">
    </form>
</body>
</html>
