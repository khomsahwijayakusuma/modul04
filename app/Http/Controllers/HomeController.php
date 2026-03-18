<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(4)->get(); // ambil 4 buku terbaru
        return view('home', compact('books'));
    }
}