<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('top');
});

// 
Route::get('/create', [RegController::class, 'create']);
Route::post('/check', [RegController::class, 'create']);
Route::post('/store', [RegController::class, 'store']);

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
