<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class ReviewController extends Controller
{
    //新規レビュー登録画面
    public function reviewCreate(Request $req)
    {
        $id = $req->book_id;
        $reviews = Review::where('book_id', $id)->with('book')->get();
        return view('review.reviewCreate', ['reviews' => $reviews]);
    }

    //新規登録確認画面
    public function postconf(Request $req)
    {
        $id = $req->input('id');
        $review = Review::find($id); //新規登録のid値に該当するレコードを取得

        // フォームから送られてきたデータを取得
        $content = $req->input('content');
        $rating = $req->input('rating');

        if ($content) {
            $review->content = $content;
        }

        if ($rating) {
            $review->rating = $rating;
        }

        // 変更内容をビューに渡す
        return view('review.postconf', [
            'review' => $review
        ]);

        // return view('review.postconf');
    }

    //新規登録完了画面
    public function reviewStore(Request $req)
    {

        if (!auth()->check()) {
            return view("/")->with('error', 'ログインが必要です。');
        }

        $review = new Review();
        $review->content = $req->content;
        $review->rating = $req->rating;
        $review->employee_id=auth()->user()->id;

        $review->save();

        // $data = [
        //     'content' => $req->content,
        //     'rating' => $req->rating
        // ];
        return view('review.reviewStore', ['review'=>$review]);
    }

    //レビュー編集処理
    public function edit(Request $req)
    {
        $id = $req->input('id');
        $record = Review::find($id);
        if (!$record) {
            abort(404, 'レビューが見つかりません。'); // レビューが見つからない場合
        }

        return view('review.edit', ['record' => $record]);
    }

    public function repost(Request $req)
    {
        // idをリクエストから取得
        $id = $req->input('id');

        // レビューをIDで検索
        $review = Review::find($id);

        if (!$review) {
            // 見つからない場合は404エラーを返す
            abort(404, 'レビューが見つかりません。');
        }

        // フォームから送られてきたデータを取得
        $newContent = $req->input('content');
        $newRating = $req->input('rating');

        // 変更された内容があれば、レビューオブジェクトに設定
        if ($newContent) {
            $review->content = $newContent;
        }

        if ($newRating) {
            $review->rating = $newRating;
        }

        // 変更内容をビューに渡す
        return view('review.repost', [
            'review' => $review
        ]);
        // return view('review.repost', [
        //     'review' => $review,
        //     'newContent' => $newContent,
        //     'newRating' => $newRating
        // ]);
    }


    //レビュー編集完了
    public function update(Request $req)
    {
        $id = $req->input('id');
        //修正対象のid値に該当するレコードを取得
        $review = Review::find($id);
        if (!$review) {
            // 見つからない場合は404エラーを返す
            abort(404, 'レビューが見つかりません。');
        }
        $newContent = $req->input('content');
        $newRating = $req->input('rating');
        if ($newContent) {
            $review->content = $newContent;
        }

        if ($newRating) {
            $review->rating = $newRating;
        }
        //モデルのデータをレーブルに保存
        $review->save();

        return view('review.update', ['review' => $review]);
    }

    //レビュー削除処理
    public function erase(Request $req)
    {
        //削除対象のid値を取得
        $id = $req->input('id');
        $review = Review::find($id);
        if (!$review) {
            // 見つからない場合は404エラーを返す
            abort(404, 'レビューが見つかりません。');
        }
        return view('review.erase', ['review' => $review]);
    }

    //レビュー削除完了
    public function delete(Request $req)
    {
        $id = $req->input('id');
        //削除対象のdi値に該当するレコードを取得
        $review = Review::find($id);
        if (!$review) {
            // 見つからない場合は404エラーを返す
            abort(404, 'レビューが見つかりません。');
        }
        //データを削除するメソッドを実行
        $review->delete();
        return view('review.delete', ['review' => $review]);
    }
}
