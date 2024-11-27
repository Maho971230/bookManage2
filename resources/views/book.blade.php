<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍詳細</title>
</head>
<body>
    <h1>書籍詳細情報</h1>
    
    <form action="/" method="post">
        @csrf
        書籍名{{}}
        <img src="/" alt="書籍の画像" width="" height="">
        著書名{{}}
        出版社名{{}}
        価格{{}}
        ISBN{{}}
        レビュー{{}} <input type="submit" value="投稿" name="post_review">
        評価{{}}
        口コミ{{}}
    
        <input type="submit" value="編集" name="update_review">
        <input type="submit" value="削除" name="delete_review">
    </form>
</body>
</html>
