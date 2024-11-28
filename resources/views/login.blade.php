<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
        <!-- 外部CSSを読み込む -->
        <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
    <div>
    <h1>社員名とパスワードを入力してください</h1>
    <form action="top" method="post">
        @csrf
        社員名　　<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required><br>
        パスワード <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
        <input type="submit" value="ログイン">
        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </form>
    </div>
</body>
</html>
