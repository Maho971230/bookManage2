<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('top');
});

//ログイン画面の表示
Route::get('login', [LoginController::class, 'login'])->name('login');
//ログイン処理
Route::post('login', [LoginController::class, 'loginCheck'])->name('login');
//ログアウト
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// 
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
Route::post('book/{id}', [BookController::class, 'book'])->name('book');

//レビュー編集画面

//レビュー編集確認

//レビュー編集完了
