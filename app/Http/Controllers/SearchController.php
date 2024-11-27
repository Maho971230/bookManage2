<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //検索画面のTop
    public function searchTop()
    {
        return view('search.searchTop');
    }

    //作者のあいまい検索の画面
    public function searchWriter()
    {
        return view('search.searchWriter');
    }

    //書籍名のあいまい検索の画面
    public function searchTitle()
    {
        return view('search.searchTitle');
    }

    //あいまい検索の処理
    public function searchList(Request $req)
    {
        $word = $req->input('word'); //入力したキーワードを取得
        $type = $req->input('type'); //作者名か書籍名か

        if ($type === 'writer') {
            $results = Book::where('writer', 'LIKE', '%{writer}%')->get();
        } elseif ($type === 'title') {
            $results = Book::where('title', 'LIKE', '%{title}%')->get();
        }

        //ビュー(searchList)に結果の連想配列を送る
        return view('search.searchList', ['results' => $results, 'word' => $word, 'type' => $type]);
    }



    // 書籍詳細ページを表示
    public function show($id)
    {
        // 指定したIDの書籍を取得
        $book = Book::findOrFail($id);

        // 詳細ビューに書籍データを渡す
        return view('books.show', ['book' => $book]);
    }
}
