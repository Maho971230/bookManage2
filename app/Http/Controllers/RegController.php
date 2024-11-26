<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class RegController extends Controller
{
    public function create()
    {
        return view('reg.create');
    }

    public function check(Request $req)
    {
    // フォームから送信されたISBNを取得
    $isbn = $req->input('isbn');

    // OpenBD APIからデータを取得
    $url = "https://api.openbd.jp/v1/get?isbn={$isbn}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // APIが結果を返さない場合
    if (empty($data[0])) {
        return response()->json(['error' => 'ISBNが見つかりませんでした。'], 404);
    }

    // 書籍情報を取得
    $bookData = $data[0]['summary'] ?? [];

    // データが空の場合
    if (empty($bookData)) {
        return response()->json(['error' => '書籍情報が取得できませんでした。'], 404);
    }

    // return view('reg.check', [
    //     'data' => [
    //         'isbn' => $isbn,
    //         'title' => $bookData['title'] ?? 'タイトル未設定',
    //         'writer' => $bookData['author'] ?? '著者未設定',
    //         'publisher' => $bookData['publisher'] ?? '出版社未設定',
    //         'price' => $bookData['price'] ?? '価格未設定',
    //     ]
    // ]);
    return response()->json([
        'isbn' => $isbn,
        'title' => $bookData['title'] ?? 'タイトル未設定',
        'writer' => $bookData['author'] ?? '著者未設定',
        'publisher' => $bookData['publisher'] ?? '出版社未設定',
        'price' => $bookData['price'] ?? '価格未設定',
    ]);
    }

    public function store(Request $request)
    {
        // フォームのデータをそのまま保存
        Book::create([
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'publisher' => $request->input('publisher'),
            'price' => $request->input('price'),
        ]);

        // 登録完了画面を表示
        return view('reg.store', [
            'data' => $request->all(),
        ]);
    }

    public function list()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('list', $data);
    }
}
