<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レビュー編集画面</title>
</head>
<body>
    <form action="/repost" method="post">
        @csrf
        <input type="hidden" name="id" value={{$record->id}}>
        <br>
        書籍名<textarea name="content">{{$record->content}}</textarea>
        <br>
        評価<input type="text">
        レビュー内容{{}}
    </form>
    <input type="submit" value="登録">
    <a href="">戻る</a>
</body>
</html>
