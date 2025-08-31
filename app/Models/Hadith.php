<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hadith extends Model
{
    protected $fillable = [
        'text',
        'source',
        'image',
    ];

    /**
     * Get daily hadith based on current date
     * Bu method her gün aynı hadisi döndürür ama günler değiştikçe farklı hadis gösterir
     */
    public static function getDailyHadith()
    {
        $today = Carbon::today();
        $dayOfYear = $today->dayOfYear; // Yılın kaçıncı günü (1-365/366)
        
        $totalHadiths = self::count();
        
        if ($totalHadiths == 0) {
            return null;
        }
        
        // Günün sırasına göre hadis seç (döngüsel olarak)
        $hadithIndex = ($dayOfYear - 1) % $totalHadiths;
        
        return self::skip($hadithIndex)->first();
    }
}
