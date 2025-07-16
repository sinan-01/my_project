<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Kitap modeli
use App\Models\Journal; // Dergi modeli

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        // Veritabanında arama yap
        $books = Book::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('author', 'LIKE', "%{$query}%")
                     ->get();
                     
        $journals = Journal::where('title', 'LIKE', "%{$query}%")
                          ->get();
        
        // Arama sonuçlarını göster
        return view('search', [
            'query' => $query,
            'books' => $books,
            'journals' => $journals
        ]);
    }
}