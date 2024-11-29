<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規レビュー登録</title>
    <!-- CSSファイルへのリンク -->
    <link rel="stylesheet" href="/assets/css/reviewCreate.css"> 
    <!-- BootstrapのCSSを読み込む -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    rel="stylesheet">
    <!-- アイコン用のFont Awesome -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    {{-- 背景 --}}
        <div class="bg_pattern Rhombus"></div>
    <h1>新規レビュー投稿</h1>
    {{-- 評価フォーム --}}
    <form action="/postconf" method="post">
        @csrf
        @foreach($reviews as $review)
            <input type="hidden" name="id" value="{{ $review->id }}">
            <p>書籍名{{$review->title}}</p>
        @endforeach
        <!--　評価　-->
        <div class="form-group">
            <label for="rating">評価（1～5）:</label>
            <div class="star-rating" id="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <input type="hidden" name="rating" id="rating" value="0">
        </div>
        <!-- コメント -->
        <div class="form-group">
            <label for="content">コメント:</label>
            <textarea name="content" id="content" class="form-control" rows="4" placeholder="レビューを記入してください"></textarea>
        </div>


        <!-- 投稿ボタン　-->
    <button type="submit" class="btn btn-primary btn-block">投稿</button>

    </form>
    
    <!-- BootstrapとFont AwesomeのJavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    {{-- 書籍情報画面に戻る --}}
    <a href="/book">戻る</a>

    <!-- 星評価のJavaScript -->
    <script>
    const stars = document.querySelectorAll(".star-rating i");
    let selectedRating = -1; // 現在の選択状態を保存する変数

    stars.forEach((star, index) => {
        // マウスオーバーで星をハイライト
        star.addEventListener("mouseover", () => {
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add("hover");
            }
            for (let i = index + 1; i < stars.length; i++) {
                stars[i].classList.remove("hover");
            }
        });

        // クリックで星の選択を確定
        star.addEventListener("click", () => {
            selectedRating = index; // 現在の選択を保存
            stars.forEach(s => s.classList.remove("selected")); // 全てリセット
            for (let i = 0; i <= selectedRating; i++) {
                stars[i].classList.add("selected");
            }
        });

        // マウスアウト時、現在の選択状態を維持
        star.addEventListener("mouseout", () => {
            stars.forEach((s, i) => {
                s.classList.remove("hover");
                if (i <= selectedRating) {
                    s.classList.add("selected");
                } else {
                    s.classList.remove("selected");
                }
            });
        });
    });
</script>
</body>
</html>
