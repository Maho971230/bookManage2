<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;

Route::get('/', function () {
    return view('top');
});

// Route::post('/',[])
Route::get('/create',[RegController::class,'create']);
Route::post('/check',[RegController::class,'create']);