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
        <input type="hidden" name="isbn" value="{{ $record->isbn }}">
        <input type="hidden" name="title" value="{{ $record->title }}">
        <input type="hidden" name="writer" value="{{ $writer }}">
        <input type="hidden" name="publisher" value="{{ $publisher }}">
        <input type="hidden" name="price" value="{{ $price }}">
        <div class="buttons">
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="/create" class="btn btn-secondary">前のページに戻る</a>
        </div>
    </form>
</body>
