<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RegController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store() {}

    public function list()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('list', $data);
    }
}
