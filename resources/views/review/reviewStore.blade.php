<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規登録完了</title>
</head>

<body>
    <h1>登録が完了しました</h1>
    <table>
        <tr>
            <th>書籍名</th>
            <th>レビュー内容</th>
            <th>評価</th>
        </tr>
        <tr>
            <td>{{$review->book->title}}</td>
            <td>{{$review->content}}</td>
            <td>{{$review->rating}}</td>
        </tr>
    </table>

    <a href="/top">トップページに戻る</a>
</body>

</html>