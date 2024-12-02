<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class ReviewController extends Controller
{
    //新規レビュー登録画面
    public function reviewCreate(Request $req,$book_id)
    {
        $book = Book::with('reviews')->findOrFail($book_id);
		return view('review.reviewCreate', ['book' => $book]);
    }

    //新規登録確認画面
    public function postconf(Request $req)
    {
        $validated = $req->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $book = Book::find($validated['book_id']);
    
        return view('review.postconf', [
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'book' => $book,
        ]);
    }

    //新規登録完了画面
    public function reviewStore(Request $req)
    {

        $messages = [
            'content.required' => 'レビュー内容は必須です。',
            'rating.required'  => '評価は必須です。',
            'rating.integer'   => '評価は整数値で入力してください。',
            'rating.min'       => '評価は1以上である必要があります。',
            'rating.max'       => '評価は5以下である必要があります。',
        ];
    
            $validated = $req->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            ]、$messages);
    
        $review = new Review();
        $review->book_id = $validated['book_id'];
        $review->content = $validated['content'];
        $review->rating = $validated['rating'];
        $review->employee_id = auth()->id(); // ログイン中のユーザーを設定
        $review->save();
    
        return view('review.reviewStore', ['review' => $review]);
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
