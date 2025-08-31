<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hadith;
use Illuminate\Support\Facades\Storage;

class HadithController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hadiths = Hadith::orderByDesc('id')->get();
        return view('admin.hadiths_index', compact('hadiths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hadiths_create');
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
            $data['image'] = $request->file('image')->store('hadiths', 'public');
        }
        Hadith::create($data);
        return redirect()->route('admin.hadiths.index')->with('success', 'Hadis başarıyla eklendi.');
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
        $hadith = Hadith::findOrFail($id);
        return view('admin.hadiths_edit', compact('hadith'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hadith = Hadith::findOrFail($id);
        $request->validate([
            'text' => 'required|string',
            'source' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['text', 'source']);
        if ($request->hasFile('image')) {
            if ($hadith->image) {
                Storage::disk('public')->delete($hadith->image);
            }
            $data['image'] = $request->file('image')->store('hadiths', 'public');
        }
        $hadith->update($data);
        return redirect()->route('admin.hadiths.index')->with('success', 'Hadis başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hadith = Hadith::findOrFail($id);
        if ($hadith->image) {
            Storage::disk('public')->delete($hadith->image);
        }
        $hadith->delete();
        return redirect()->route('admin.hadiths.index')->with('success', 'Hadis başarıyla silindi.');
    }
}
