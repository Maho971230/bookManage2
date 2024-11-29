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
    <div id="result" style="display: none; margin-top: 20px;">
    <h3>検索結果</h3>
    <p><strong>ISBN:</strong> <span id="result-isbn"></span></p>
    <p><strong>タイトル:</strong> <span id="result-title"></span></p>
    <p><strong>著者:</strong> <span id="result-writer"></span></p>
    <p><strong>出版社:</strong> <span id="result-publisher"></span></p>
    <p><strong>価格:</strong> <span id="result-price"></span></p>
</div>

    <button id="amazonBtn" class="btn btn-primary">Amazon</button>

    <!-- JavaScript でリダイレクト -->
    <script>
        document.getElementById("amazonBtn").addEventListener("click", function() {
            // 外部リンクにリダイレクト
            window.location.href = 'https://www.amazon.co.jp/?&tag=hydraamazonav-22&ref=pd_sl_8eaqjij3p0_e&adgrpid=157529193801&hvpone=&hvptwo=&hvadid=675152705458&hvpos=&hvnetw=g&hvrand=6870138715292486806&hvqmt=e&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9198198&hvtargid=kwd-893523692&hydadcr=27920_14701882&gad_source=1';
        });
    </script>

    <button id="rakutenBtn" class="btn btn-primary">楽天市場</button>
<!-- JavaScript でリダイレクト -->
<script>
    document.getElementById("rakutenBtn").addEventListener("click", function() {
        // 外部リンクにリダイレクト
        window.location.href = 'https://www.rakuten.co.jp/';
    });
</script>

<button id="yahooBtn" class="btn btn-primary">Yahooショッピング</button>
    <!-- JavaScript でリダイレクト -->
    <script>
        document.getElementById("yahooBtn").addEventListener("click", function() {
            // 外部リンクにリダイレクト
            window.location.href = 'https://shopping.yahoo.co.jp/?sc_e=ad_listing_gpmax_maxg&gad_source=1&gclid=CjwKCAiAxqC6BhBcEiwAlXp451bkWIIBuwmb_kJoi9GxnatYLgrg1Rwj35Al4KlDUhBcy60F1713eBoCtAsQAvD_BwE';
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

            } catch (error) {
                alert(error.response.data.error || 'エラーが発生しました');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
