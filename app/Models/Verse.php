<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Verse extends Model
{
    protected $fillable = [
        'text',
        'source',
        'image',
    ];

    /**
     * Get daily verse based on current date
     * Bu method her gün aynı ayeti döndürür ama günler değiştikçe farklı ayet gösterir
     */
    public static function getDailyVerse()
    {
        $today = Carbon::today();
        $dayOfYear = $today->dayOfYear; // Yılın kaçıncı günü (1-365/366)
        
        $totalVerses = self::count();
        
        if ($totalVerses == 0) {
            return null;
        }
        
        // Günün sırasına göre ayet seç (döngüsel olarak)
        $verseIndex = ($dayOfYear - 1) % $totalVerses;
        
        return self::skip($verseIndex)->first();
    }
}
