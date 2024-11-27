<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍検索</title>
</head>
<body>
    <h1>書籍名(キーワード)を入力してください</h1>
    <form action="/search/searchTitle" method="post"><a href="/">トップページに戻る</a>
        <input type="text" name="title" required><input type="submit" value="検索">
    </form>
</body>
</html>
