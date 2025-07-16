<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // HomeController'ı kullanalım, eğer controller kullanacaksak

// Ana Sayfa (index)
Route::get('/', function () {
    return view('index');
})->name('index');

// admin
Route::get('/admin', function () {
    return view('admin.app');
})->name('app');

// Kitaplar Sayfası
Route::get('/kitablar', function () {
    return view('kitablar'); // kitaplar.blade.php dosyasını göster
})->name('kitablar');

// Jurnallar Sayfası
Route::get('/jurnallar', function () {
    return view('jurnallar'); // jurnallar.blade.php dosyasını göster
})->name('jurnallar');

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

require __DIR__.'/auth.php';
