@extends('admin.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Kitap Detayı</h3>
                    <div>
                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning">Düzenle</a>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" 
                                     alt="Kitap Kapağı" class="img-fluid rounded">
                            @else
                                <div class="bg-light p-4 text-center rounded">
                                    <p class="text-muted">Kapak görseli yok</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $book->title }}</h4>
                            @if($book->author)
                                <p><strong>Yazar:</strong> {{ $book->author }}</p>
                            @endif
                            @if($book->description)
                                <p><strong>Açıklama:</strong></p>
                                <p>{{ $book->description }}</p>
                            @endif
                            @if($book->pdf_file)
                                <p><strong>PDF:</strong> 
                                    <a href="{{ asset('storage/' . $book->pdf_file) }}" 
                                       target="_blank" class="btn btn-sm btn-info">PDF'i Görüntüle</a>
                                </p>
                            @endif
                            <p><strong>Oluşturulma Tarihi:</strong> {{ $book->created_at->format('d.m.Y H:i') }}</p>
                            <p><strong>Son Güncelleme:</strong> {{ $book->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 