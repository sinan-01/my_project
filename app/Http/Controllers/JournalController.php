<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        // Tüm jurnalları al
        $journals = Journal::latest()->get();
        
        return view('jurnallar', compact('journals'));
    }
} 