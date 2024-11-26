<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class ReviewController extends Controller
{
    //新規レビュー登録画面
    public function reviewCreate()
    {
        return view('review.reviewCreate');
    }

    //新規登録確認画面
    public function postconf(Request $req) {}

    //新規登録完了画面
    public function reviewStore(Request $req) {}

    //レビュー編集画面
    public function edit()
    {
        return view('review.edit');
    }

    //レビュー編集処理
    public function repost(Request $req)
    {
        //修正対象データのid値を取得
        $id=$req->id;
        $data=[
            //指定したid値に該当するレコードを連想配列に保存
            'record'=>Review::find($id)
        ];
        return view('view.repost',$data);
    }

    //レビュー編集完了
    public function update(Request $req)
    {
        //修正対象のid値に該当するレコードを取得
        $review=Review::find($req->id);
        //フォームに入力されているデータをモデルに上書き
        $review->content=$req->content;
        //モデルのデータをレーブルに保存
        $review->save();
        $data=[
            'id'=>$req->id,
            'content'=>$req->content
        ];
        return view('review.update,$data');
    }

    //レビュー削除画面
    public function ()
    {
        return view('');
    }

    //レビュー削除処理
    public function erase(Request $req)
    {
        //削除対象のid値を取得
        $id=$req->id;
        //指定したid値に該当するレコードを連想配列に保存
        $data=[
            'record'=>Review::find($id)
        ];
        return view('review.erase',$data);
    }

    //レビュー削除完了
    public function delete(Request $req)
    {
        //削除対象のdi値に該当するレコードを取得
        $review=Review::find($req->id);
        //該当するレコードの情報を連想配列に保存
        $data=[
            'id'=>$req->id,
            'content'=>$review->content
        ];
        //データを削除するメソッドを実行
        $review->delete();
        return view('review.delete',$data);
    }
}
