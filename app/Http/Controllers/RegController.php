<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegController extends Controller
{
    public function create()
{
return view('reg.create');
}

    public function check(Request $req)
    {
        $validated = $req->validate([
        'isbn' => 'required|unique:books,isbn',
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'publisher' => 'required|max:255',
        'price' => 'required|numeric|min:0',
        ]);
        return view('reg.check', $validated);
        
        redirect('top');
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
