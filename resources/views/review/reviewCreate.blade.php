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
    <h1>新規レビュー投稿</h1>
    {{-- 評価フォーム --}}
    <form action="/postconf" method="post">
        @csrf
        @foreach($reviews as $review)
            <input type="hidden" name="id" value="{{ $review->id }}">
            <p>書籍名{{$review->title}}</p>
        @endforeach
        <!--　評価　-->
        @foreach($reviews as $review)
        <div class="form-group">
            {{-- 評価ラベル --}}
            <label for="rating-{{ $review->id }}">評価（1～5）:</label>
            {{-- 星の評価を表示するコンテナ --}}
            <div class="star-rating" id="rating-{{ $review->id }}">
                {{-- 各星の状態をサーバからの評価に戻づいて設定 --}}
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star {{ $review->rating >= $i ? 'selected' : '' }}" data-value="{{ $i }}"></i>
                @endfor
            </div>
            {{-- サーバに送信する評価値 --}}
            <input type="hidden" name="ratings[{{ $review->id }}]" value="{{ $review->rating ?? 0 }}">
        </div>
        @endforeach
        
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
    <a href="/top">戻る</a>

    <!-- 星評価のJavaScript -->
    <script>
       // 全ての評価コンテナを取得
        const allRatings = document.querySelectorAll(".star-rating");

        allRatings.forEach(ratingContainer => {
            // 対象コンテナ内の全ての星要素を取得
            const stars = ratingContainer.querySelectorAll("i");
            // 対応するhidden inputを取得
            const hiddenInput = ratingContainer.nextElementSibling; 
            // 現在の評価をhidden inputから取得（初期値: 0）
            let selectedRating = parseInt(hiddenInput.value) || 0;

            // 星要素ごとのイベントを登録
            stars.forEach((star, index) => {
                // マウスオーバー時、星を一時的にハイライト
                star.addEventListener("mouseover", () => {
                    // カーソルの位置まで全ての星をハイライト
                    for (let i = 0; i <= index; i++) stars[i].classList.add("hover");
                    // カーソルの後ろの星はハイライトを外す
                    for (let i = index + 1; i < stars.length; i++) stars[i].classList.remove("hover");
                });

                // クリック時、選択した評価を確定
                star.addEventListener("click", () => {
                    selectedRating = index + 1; // 現在の選択を保存（1から始まる値）
                    // 全ての星を一度リセットし、選択済みのものをハイライト
                    stars.forEach((s, i) => s.classList.toggle("selected", i < selectedRating));
                    // hidden inputに選択した評価を反映
                    hiddenInput.value = selectedRating;
                });

                // マウスアウト時、現在の選択状態を維持
                star.addEventListener("mouseout", () => {
                    stars.forEach((s, i) => {
                        s.classList.remove("hover"); // 一時的なハイライトを消去
                        // 現在の選択に応じてハイライトを再適用
                        s.classList.toggle("selected", i < selectedRating);
                    });
                });
            });
        });

</script>
</body>
</html>
