@extends('admin.app')
@section('content')
<div class="container mt-4">
    <h2>Jurnal Düzenle</h2>
    <form action="{{ route('admin.journals.update', $journal) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $journal->title) }}" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea name="description" class="form-control">{{ old('description', $journal->description) }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Kapak Görseli</label>
            @if($journal->cover_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $journal->cover_image) }}" alt="Kapak" width="120">
                </div>
            @endif
            <input type="file" name="cover_image" class="form-control">
            @error('cover_image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="pdf_file" class="form-label">PDF Dosyası</label>
            @if($journal->pdf_file)
                <div class="mb-2">
                    <a href="{{ asset('storage/' . $journal->pdf_file) }}" target="_blank" class="btn btn-sm btn-info">Mevcut PDF'i Görüntüle</a>
                </div>
            @endif
            <input type="file" name="pdf_file" class="form-control">
            @error('pdf_file')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('admin.journals.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection 