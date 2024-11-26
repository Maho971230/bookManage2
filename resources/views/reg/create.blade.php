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
    <h1>ISBNを入力してください</h1><a href="/">トップページに戻る</a>
        <form action="/check" method="post">
            @csrf
            <div class="bm-3">
                <label for="isbn" class="form-label" >ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required>

            </div>
            <input type="submit" value="検索" class="btn btn-primary">
        </form>
            <script>
            document.getElementById("btnCheck").addEventListener("click", async (e) => {
    // ISBNを取得（入力フィールドから）
    const isbn = document.getElementById("isbn").value;

    // ISBNが空でないか確認
    if (!isbn) {
        alert("ISBNを入力してください。");
        return;
    }

    const url = `https://api.openbd.jp/v1/get?isbn=${isbn}`;

    // APIリクエストを送信
    const res = await fetch(url);
    const data = await res.json();

    // ISBN情報が見つかった場合

    if (data[0]) {
        const bookData = data[0].summary;
        document.querySelector('input[name="title"]').value =
            bookData.title || ""; // 書籍名
        document.querySelector('input[name="writer"]').value =
            bookData.writer || ""; // 著者名
        document.querySelector('input[name="publisher"]').value =
            bookData.publisher || ""; // 出版社名
    } else {
        alert("ISBN情報が見つかりませんでした。");
    }
});

        </script>
</body>
</html>
