<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RegController extends Controller
{
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {
            return view('create');
        } elseif ($req->isMethod('post')) {
            $validated = $req->validate([
                'isbn' => 'required|unique:books,isbn',
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'publisher' => 'required|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            return view('store', $validated);
        } else {
            redirect('top');
        }
    }

    public function store(Request $req)
    {
        $book = new Book();
        $book->id = $req;

        // データベースに保存
        // Book::create($validated);
    }

    public function list()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('list', $data);
    }
}
