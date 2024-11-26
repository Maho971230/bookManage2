<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;

Route::get('/', function () {
    return view('login');
});

//ログイン画面の表示
Route::get('/login', [LoginController::class, 'login'])->name('login');
//ログイン処理
Route::match(['get', 'post'], '/top', [LoginController::class, 'loginCheck'])->name('login');
//ログアウト
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Top画面を表示
Route::match(['get', 'post'], '/top', [LoginController::class, 'top'])->name('top');

Route::get('/create', [RegController::class, 'create'])->name('create');
Route::post('/check', [RegController::class, 'create'])->name('check');
Route::post('/store', [RegController::class, 'store'])->name('store');

//一覧を表示
Route::get('/list', [RegController::class, 'list']);

//検索Topを表示
Route::get('/searchTop', [SearchController::class, 'searchTop'])->name('search.searchTop');
//作者から検索を表示
Route::get('/searchWriter', [SearchController::class, 'searchWriter'])->name('search.searchWriter');
//書籍から検索を表示
Route::get('/searchTitle', [SearchController::class, 'searchTitle'])->name('search.searchTitle');
//検索結果を表示
Route::post('/searchList', [SearchController::class, 'searchList'])->name('search.searchList');

// 書籍詳細ページを表示
Route::get('book/{id}', [BookController::class, 'book'])->name('book');

//レビュー登録画面
Route::post('/reviewCreate/{book_id}', [ReviewController::class, 'reviewCreate'])->name('reviewCreate');
//レビュー登録確認
Route::post('/postconf', [ReviewController::class, 'postconf'])->name('postconf');
//レビュー登録完了
Route::post('/reviewStore', [ReviewController::class, 'reviewStore'])->name('reviewStore');

//レビュー編集画面
Route::post('/edit/{id}', [ReviewController::class, 'edit'])->name('edit');
//レビュー編集確認
Route::post('/repost', [ReviewController::class, 'repost'])->name('repost');
//レビュー編集完了
Route::post('/update', [ReviewController::class, 'update'])->name('update');

//レビュー削除確認
Route::post('/erase', [ReviewController::class, 'erase'])->name('erase');
//レビュー削除完了
Route::post('/delete', [ReviewController::class, 'delete'])->name('delete');
