<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = Journal::all();
        return view('admin.journals_index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.journals_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240', // 10MB max
        ]);

        $data = $request->only(['title', 'description']);

        // Kapak görseli yükleme
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('journals/covers', 'public');
            $data['cover_image'] = $coverPath;
        }

        // PDF dosyası yükleme
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('journals/pdfs', 'public');
            $data['pdf_file'] = $pdfPath;
        }

        Journal::create($data);

        return redirect()->route('admin.journals.index')->with('success', 'Jurnal başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        return view('admin.journals_show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        return view('admin.journals_edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240', // 10MB max
        ]);

        $data = $request->only(['title', 'description']);

        // Kapak görseli yükleme
        if ($request->hasFile('cover_image')) {
            // Eski dosyayı sil
            if ($journal->cover_image) {
                Storage::disk('public')->delete($journal->cover_image);
            }
            $coverPath = $request->file('cover_image')->store('journals/covers', 'public');
            $data['cover_image'] = $coverPath;
        }

        // PDF dosyası yükleme
        if ($request->hasFile('pdf_file')) {
            // Eski dosyayı sil
            if ($journal->pdf_file) {
                Storage::disk('public')->delete($journal->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('journals/pdfs', 'public');
            $data['pdf_file'] = $pdfPath;
        }

        $journal->update($data);

        return redirect()->route('admin.journals.index')->with('success', 'Jurnal başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        // Dosyaları sil
        if ($journal->cover_image) {
            Storage::disk('public')->delete($journal->cover_image);
        }
        if ($journal->pdf_file) {
            Storage::disk('public')->delete($journal->pdf_file);
        }

        $journal->delete();

        return redirect()->route('admin.journals.index')->with('success', 'Jurnal başarıyla silindi.');
    }
}
