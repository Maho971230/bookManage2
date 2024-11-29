<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍検索</title>
    <!-- CSSファイルへのリンク -->
    <link rel="stylesheet" href="/assets/css/searchTop.css">
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
        <h2>書籍検索</h2>
    </div>
    @csrf
    <div class="searchButton">
        <a href="/searchTitle" class="btn btn-outline-success">書籍名で検索</a>
        <a href="/searchWriter" class="btn btn-outline-success">著者名で検索</a>
    </div>
</body>
</html>
