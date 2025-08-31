<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books_index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240', // 10MB max
        ]);

        $data = $request->only(['title', 'description', 'author']);

        // Kapak görseli yükleme
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('books/covers', 'public');
            $data['cover_image'] = $coverPath;
        }

        // PDF dosyası yükleme
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('books/pdfs', 'public');
            $data['pdf_file'] = $pdfPath;
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books_show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books_edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240', // 10MB max
        ]);

        $data = $request->only(['title', 'description', 'author']);

        // Kapak görseli yükleme
        if ($request->hasFile('cover_image')) {
            // Eski dosyayı sil
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $coverPath = $request->file('cover_image')->store('books/covers', 'public');
            $data['cover_image'] = $coverPath;
        }

        // PDF dosyası yükleme
        if ($request->hasFile('pdf_file')) {
            // Eski dosyayı sil
            if ($book->pdf_file) {
                Storage::disk('public')->delete($book->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('books/pdfs', 'public');
            $data['pdf_file'] = $pdfPath;
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Dosyaları sil
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        if ($book->pdf_file) {
            Storage::disk('public')->delete($book->pdf_file);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla silindi.');
    }
}
