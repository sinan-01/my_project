@extends('admin.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Jurnal Detayı</h3>
                    <div>
                        <a href="{{ route('admin.journals.edit', $journal) }}" class="btn btn-warning">Düzenle</a>
                        <a href="{{ route('admin.journals.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($journal->cover_image)
                                <img src="{{ asset('storage/' . $journal->cover_image) }}" 
                                     alt="Jurnal Kapağı" class="img-fluid rounded">
                            @else
                                <div class="bg-light p-4 text-center rounded">
                                    <p class="text-muted">Kapak görseli yok</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $journal->title }}</h4>
                            @if($journal->description)
                                <p><strong>Açıklama:</strong></p>
                                <p>{{ $journal->description }}</p>
                            @endif
                            @if($journal->pdf_file)
                                <p><strong>PDF:</strong> 
                                    <a href="{{ asset('storage/' . $journal->pdf_file) }}" 
                                       target="_blank" class="btn btn-sm btn-info">PDF'i Görüntüle</a>
                                </p>
                            @endif
                            <p><strong>Oluşturulma Tarihi:</strong> {{ $journal->created_at->format('d.m.Y H:i') }}</p>
                            <p><strong>Son Güncelleme:</strong> {{ $journal->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 