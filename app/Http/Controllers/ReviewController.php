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

    //レビュー編集確認画面
    public function repost(Request $req)
    {
        $id=$req->id;
    }
}
