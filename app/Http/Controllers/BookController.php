<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class BookController extends Controller
{
    public function book(Request $req)
    {
        $id = $req->id;
        $book = [
            'record' => Book::find($id)
        ];
        return view('book', ['book' => $book]);
    }
}
