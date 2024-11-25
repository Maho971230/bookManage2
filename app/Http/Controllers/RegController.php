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
            'writer' => 'required|max:255',
            'publisher' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        return view('reg.check', ['data' => $validated]);
    }

    public function store(Request $req)
    {
        Book::create([
            'isbn' => $req->isbn,
            'title' => $req->title,
            'writer' => $req->author,
            'publisher' => $req->publisher,
            'price' => $req->price,
        ]);

        return view('reg.store',);
    }

    public function list()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('list', $data);
    }
}
