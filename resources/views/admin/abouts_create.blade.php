@extends('admin.app')
@section('content')
<div class="container mt-4">
    <h2>Hakkımızda Ekle</h2>
    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Görsel (Opsiyonel)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
        <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection 