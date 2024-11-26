document.getElementById("btnCheck").addEventListener("click", async (e) => {
    // ISBNを取得（入力フィールドから）
    const isbn = document.getElementById("isbn").value;

    // ISBNが空でないか確認
    if (!isbn) {
        alert("ISBNを入力してください。");
        return;
    }

    const url = `https://api.openbd.jp/v1/get?isbn=${isbn}`;

    // APIリクエストを送信
    const res = await fetch(url);
    const data = await res.json();

    // ISBN情報が見つかった場合
    if (data[0]) {
        const bookData = data[0].summary;
        document.querySelector('input[name="title"]').value =
            bookData.title || ""; // 書籍名
        document.querySelector('input[name="author"]').value =
            bookData.author || ""; // 著者名
        document.querySelector('input[name="publisher"]').value =
            bookData.publisher || ""; // 出版社名
    } else {
        alert("ISBN情報が見つかりませんでした。");
    }
});
