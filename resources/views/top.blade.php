<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="/assets/css/top.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="appTitle">
        <h1>書籍管理システム</h1>
    </div>
    <div class="logout-container">
        <form action="logout" method="post">@csrf<input type="submit" value="ログアウト"></form>
    </div>
    <div class="contents">
        <a href="/create" class="btn btn-outline-success">書籍登録</a>
        <a href="/searchTop" class="btn btn-outline-success">書籍検索</a>
        <a href="/list" class="btn btn-outline-success">書籍一覧</a>
    </div>
</body>
</html>
