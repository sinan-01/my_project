@extends('admin.app')
@section('content')
<div class="container mt-4">
    <h2>Hadis Düzenle</h2>
    <form action="{{ route('admin.hadiths.update', $hadith) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="text" class="form-label">Hadis Metni</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text', $hadith->text) }}</textarea>
            @error('text')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="source" class="form-label">Kaynak (Ravi)</label>
            <input type="text" name="source" class="form-control" value="{{ old('source', $hadith->source) }}">
            @error('source')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Görsel (Opsiyonel)</label>
            @if($hadith->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $hadith->image) }}" alt="Görsel" width="120">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('admin.hadiths.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection 