<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Tüm kitapları al
        $books = Book::latest()->get();
        
        return view('kitablar', compact('books'));
    }
} 