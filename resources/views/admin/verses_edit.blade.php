@extends('admin.app')
@section('content')
<div class="container mt-4">
    <h2>Ayet Düzenle</h2>
    <form action="{{ route('admin.verses.update', $verse) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="text" class="form-label">Ayet Metni</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text', $verse->text) }}</textarea>
            @error('text')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="source" class="form-label">Kaynak (Sure:Ayet)</label>
            <input type="text" name="source" class="form-control" value="{{ old('source', $verse->source) }}">
            @error('source')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Görsel (Opsiyonel)</label>
            @if($verse->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $verse->image) }}" alt="Görsel" width="120">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('admin.verses.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection 