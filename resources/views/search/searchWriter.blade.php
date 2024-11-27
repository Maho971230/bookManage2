<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>著者名検索</title>
</head>
<body>
    <h1>著者名(キーワード)を入力してください</h1>
    <form action="/searchList" method="post"><a href="/">トップページに戻る</a>
        @csrf
        <input type="hidden" name="type" value="writer">
        <input type="text" name="word" required><input type="submit" value="検索">
    </form>
</body>
</html>
