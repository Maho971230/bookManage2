<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/getIsbn.js" defer></script>
</head>
<body>
    <h1>ISBNを入力してください</h1><a href="/top">トップページに戻る</a>
    <form action="/reg/store" method="post">
        <input type="text" name="isbn" required>
        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><div class="modal-title" id="myModalLabel">こちらの内容で登録してもよろしいですか？</div></h4>
                    </div>
                    <div class="modal-body">
                        <label> ISBN{{}}
                                書籍名{{}}
                                著者名{{}}
                                出版社名{{}}
                                価格{{}}
                                
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-danger">登録</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>