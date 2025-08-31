<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Verse;
use Illuminate\Support\Facades\Storage;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $verses = Verse::orderByDesc('id')->get();
        return view('admin.verses_index', compact('verses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.verses_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'source' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['text', 'source']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('verses', 'public');
        }
        Verse::create($data);
        return redirect()->route('admin.verses.index')->with('success', 'Ayet başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $verse = Verse::findOrFail($id);
        return view('admin.verses_edit', compact('verse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $verse = Verse::findOrFail($id);
        $request->validate([
            'text' => 'required|string',
            'source' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['text', 'source']);
        if ($request->hasFile('image')) {
            if ($verse->image) {
                Storage::disk('public')->delete($verse->image);
            }
            $data['image'] = $request->file('image')->store('verses', 'public');
        }
        $verse->update($data);
        return redirect()->route('admin.verses.index')->with('success', 'Ayet başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $verse = Verse::findOrFail($id);
        if ($verse->image) {
            Storage::disk('public')->delete($verse->image);
        }
        $verse->delete();
        return redirect()->route('admin.verses.index')->with('success', 'Ayet başarıyla silindi.');
    }
}
