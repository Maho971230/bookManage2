<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録</title>
    <link rel="stylesheet" href="/assets/css/create.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body { width:600px; margin: 0 auto; }
        #result { display: none; margin-top: 20px; }
        #registerBtn { display: none; }
    </style>
</head>
<body>
    <div class="appTitle">
        <h1>書籍管理システム</h1>
    </div>
    <div class="subTitle">
        <h2>書籍登録</h2>
    </div>
    <div class="backToTop-container">
        <a href="/top" class="btn btn-success">Topページに戻る</a>
    </div>
    <p>ISBNを入力してください</p>
    
    <div>
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" id="isbn" class="form-control" required>
        <button id="searchBtn" class="btn btn-outline-success">検索</button>
    </div>
    <div id="result" style="display: none; margin-top: 20px;">
    <h3>検索結果</h3>
    <p><strong>ISBN:</strong> <span id="result-isbn"></span></p>
    <p><strong>タイトル:</strong> <span id="result-title"></span></p>
    <p><strong>著者:</strong> <span id="result-writer"></span></p>
    <p><strong>出版社:</strong> <span id="result-publisher"></span></p>
    <p><strong>価格:</strong> <span id="result-price"></span></p>
</div>

    <button id="openbdBtn" class="btn btn-success">openBD</button>

    <!-- JavaScript でリダイレクト -->
    <script>
        document.getElementById("openbdBtn").addEventListener("click", function() {
            // 外部リンクにリダイレクト
            window.location.href = 'https://openbd.jp/';
        });
    </script>

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
                document.getElementById('registerBtn').style.display = 'inline-block';

            } catch (error) {
                alert(error.response.data.error || 'エラーが発生しました');
            }
        });
        document.getElementById('registerBtn').addEventListener('click', async () => {
            const isbn = document.getElementById('result-isbn').textContent;
            const title = document.getElementById('result-title').textContent;
            const writer = document.getElementById('result-writer').textContent;
            const publisher = document.getElementById('result-publisher').textContent;
            const price = document.getElementById('result-price').textContent;

            try {
                const response = await axios.post('/store', { isbn, title, writer, publisher, price });
                alert('登録が完了しました。');
            } catch (error) {
                alert('登録中にエラーが発生しました。');
            }
        }); 
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
