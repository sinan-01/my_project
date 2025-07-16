<!-- search.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Arama Sonuçları: "{{ $query }}"</h1>
    
    <h2>Kitablar</h2>
    @if($books->count() > 0)
        <div class="books-container">
            @foreach($books as $book)
                <div class="book">
                    <p class="book-title">{{ $book->title }}</p>
                    <p class="book-author">{{ $book->author }}</p>
                    <div class="cover">
                        <img src="{{ asset('images/books/'.$book->image) }}" alt="{{ $book->title }}" class="cover-image">
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Heçbir kitab tapılmadı.</p>
    @endif
    
    <h2>Jurnallar</h2>
    @if($journals->count() > 0)
        <div class="journals-container">
            @foreach($journals as $journal)
                <div class="journal">
                    <p class="journal-title">{{ $journal->title }}</p>
                    <div class="cover">
                        <img src="{{ asset('images/'.$journal->image) }}" alt="{{ $journal->title }}" class="cover-image">
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Heçbir jurnal tapılmadı.</p>
    @endif
</div>
@endsection