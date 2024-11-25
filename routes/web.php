<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegContrtoller;

Route::get('/', function () {
    return view('top');
});

Route::get('/create', [RegController::class, 'create']);
