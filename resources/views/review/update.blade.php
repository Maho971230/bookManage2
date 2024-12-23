<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>編集完了画面</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <h1>レビューを変更しました</h1>
    <table class="table">
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

    <a href="{{ route('top') }}" class="btn btn-primary">トップページに戻る</a>
  </body>
</html>
