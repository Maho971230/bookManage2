<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/getIsbn.js" defer></script>
     <style> body { width:600px; margin: 0 auto; }</style>
</head>
<body>
    <h1>ISBNを入力してください</h1>
    <!-- <a href="/">トップページに戻る</a> -->
        <form action="/check" method="post">
            @csrf
            <div class="bm-3">
                <label for="isbn" class="form-label" >ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required>
            </div>
            <input type="submit" value="検索" class="btn btn-primary">
        </form>
</body>
</html>