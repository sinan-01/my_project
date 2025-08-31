<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Journal;
use App\Models\Slider;
use App\Models\Hadith;
use App\Models\Verse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Slider verilerini al
        $sliders = Slider::all();
        
        // Günün hadisini al (her gün aynı hadis ama günler değiştikçe farklı hadis)
        $randomHadith = Hadith::getDailyHadith();
        
        // Günün ayetini al (her gün aynı ayet ama günler değiştikçe farklı ayet)
        $randomVerse = Verse::getDailyVerse();
        
        return view('index', compact('sliders', 'randomHadith', 'randomVerse'));
    }
} 