<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // HomeController'ı kullanalım, eğer controller kullanacaksak

// Ana Sayfa (index)
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// admin
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('admin');

// app route for authentication redirect
Route::get('/app', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('app');

// Kitaplar Sayfası
Route::get('/kitablar', [App\Http\Controllers\BookController::class, 'index'])->name('kitablar');

// Jurnallar Sayfası
Route::get('/jurnallar', [App\Http\Controllers\JournalController::class, 'index'])->name('jurnallar');

// Arama sayfası
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

// Hakkımızda Sayfası
Route::get('/hakkimizda', function () {
    return view('hakkimizda'); // hakkimizda.blade.php dosyasını göster
})->name('hakkimizda');


// jurnallar
Route::get('/ugur', function () {
    return view('jurnallar.ugur'); // resources/views/ugur.blade.php olacak
})->name('ugur');

Route::get('/gulustan', function () {
    return view('jurnallar.gulustan'); // resources/views/gulustan.blade.php olacak
})->name('gulustan');

Route::get('/tebessum', function () {
    return view('jurnallar.tebessum'); // resources/views/tebessum.blade.php olacak
})->name('tebessum');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin panel yönetimi
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('books', App\Http\Controllers\Admin\BookController::class);
    Route::resource('journals', App\Http\Controllers\Admin\JournalController::class);
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('verses', App\Http\Controllers\Admin\VerseController::class);
    Route::resource('hadiths', App\Http\Controllers\Admin\HadithController::class);
    Route::resource('abouts', App\Http\Controllers\Admin\AboutController::class);
});

require __DIR__.'/auth.php';
