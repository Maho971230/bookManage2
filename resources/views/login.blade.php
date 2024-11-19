<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <h1>社員名とパスワードを入力してください</h1>
    <form action="/top" method="post">
        @csrf
        社員名　　 <input type="text" name="userName" required><br>
        パスワード <input type="password" name="password" required>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>