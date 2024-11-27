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
        $book = Book::find($id);
        $reviews = Review::where('book_id',$id)->get();
        $relation = Book::all();

        return view('book', ['book' => $book, 'reviews' => $reviews, 'relation' => $relation]);
    }
}
