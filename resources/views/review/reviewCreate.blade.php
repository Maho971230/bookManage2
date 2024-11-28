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
    <form action="/review/postconf" method="post">
        @csrf
        @foreach($reviews as $review)
            <p>書籍名{{$review->title}}</p>
        @endforeach
        <!--　評価　-->
        <div class="form-group">
            <label for="rating">評価（1～5）:</label>
            <div class="star-rating" id="star-rating">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <input type="hidden" name="rating" id="rating" value="0">
        </div>
        <!-- コメント -->
        <div class="form-group">
            <label for="comment">コメント:</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="レビューを記入してください"></textarea>
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
        const stars = document.querySelectorAll("#star-rating i");
        const ratingInput = document.getElementById("rating");
        
        let index =[1,2,3,4,5]; 
        stars.forEach((star, index) => {
            star.addEventListener("mouseover", () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add("selected");
                }
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove("selected");
                }
            });
            
            star.addEventListener("click", () => {
                ratingInput.value = index + 1;
            });
        });
        
        stars.forEach((star) => {
            star.addEventListener("mouseout", () => {
                stars.forEach((star) => {
                    star.classList.remove("selected");
                });
            });
        });
    </script>
</body>
</html>
