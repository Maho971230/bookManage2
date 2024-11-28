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
    
    <div>
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" id="isbn" class="form-control" required>
        <button id="searchBtn" class="btn btn-primary mt-3">検索</button>
    </div>

    <script>
        document.getElementById('searchBtn').addEventListener('click', async () => {
            const isbn = document.getElementById('isbn').value;

            if (!isbn) {
                alert("ISBNを入力してください。");
                return;
            }

            try {
                const response = await axios.post('/check', { isbn });
                const data = response.data;

                // 結果を表示
                document.getElementById('result-isbn').textContent = data.isbn;
                document.getElementById('result-title').textContent = data.title;
                document.getElementById('result-writer').textContent = data.writer;
                document.getElementById('result-publisher').textContent = data.publisher;
                document.getElementById('result-price').textContent = data.price;
                document.getElementById('result').style.display = 'block';

            } catch (error) {
                alert(error.response.data.error || 'エラーが発生しました');
            }
        });
    </script>
</body>
</html>
