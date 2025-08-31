@extends('admin.app')
@section('content')
<div class="container mt-4">
    <h2>Hakkımızda Yönetimi</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($about)
        <div class="card mb-4">
            <div class="card-body">
                <h4>{{ $about->title }}</h4>
                @if($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Görsel" width="120" class="mb-3">
                @endif
                <div>{!! nl2br(e($about->content)) !!}</div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-warning">Düzenle</a>
                <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">+ Hakkımızda Ekle</a>
    @endif
</div>
@endsection 