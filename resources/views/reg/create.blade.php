<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body { width:600px; margin: 0 auto; }
    </style>
</head>
<body>
    <h1>書籍登録</h1>
    <a href="/top">トップページに戻る</a>
    <p>ISBNを入力してください</p>
    
    <!-- ISBN検索フォーム -->
    <form action="{{ route('check') }}" method="post">
        @csrf
        <div class="bm-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
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

        //openbdのurl
        const url = `https://api.openbd.jp/v1/get?isbn=${isbn}`;

        // APIリクエストを送信
        //fetch()を利用したURLに接続し、データをダウンロード
        const res = await fetch(url);
        //データの受信が完了したら、JSONデータに変換
        const data = await res.json();

        // ISBN情報が見つからなかった場合
        if (!data[0]) {
            alert("ISBNが見つかりませんでした");
            return;
        }

        // ISBN情報が見つかった場合
        const bookData = data[0].summary;

        // フォームに取得したデータを入力
        document.getElementById('title').value = bookData.title || "";
        document.getElementById('writer').value = bookData.writer || "";
        document.getElementById('publisher').value = bookData.publisher || "";
        document.getElementById('price').value = bookData.price || "";
    });
</script>
</body>
</html>
