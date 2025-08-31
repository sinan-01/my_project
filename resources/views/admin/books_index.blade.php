@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">📚 Kitaplar Yönetimi</h1>
                        <p class="modern-subtitle">Tüm kitapları görüntüleyin, düzenleyin ve yenilerini ekleyin</p>
                    </div>
                    <a href="{{ route('admin.books.create') }}" class="btn btn-outline-light btn-modern">
                        <i class="lni lni-plus"></i> Yeni Kitap Ekle
                    </a>
                </div>
            </div>

            <!-- Modern Content Card -->
            <div class="modern-content-card">
                @if(session('success'))
                    <div class="modern-alert modern-alert-success">
                        <i class="lni lni-checkmark-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($books->count() > 0)
                    <!-- Stats Header -->
                    <div class="content-stats">
                        <div class="stat-item">
                            <i class="lni lni-book"></i>
                            <div>
                                <span class="stat-number">{{ $books->count() }}</span>
                                <span class="stat-label">Toplam Kitap</span>
                            </div>
                        </div>
                    </div>

                    <!-- Modern Table -->
                    <div class="modern-table-wrapper">
                        <div class="table-responsive">
                            <table class="modern-table">
                                <thead>
                                    <tr>
                                        <th><i class="lni lni-hash"></i> ID</th>
                                        <th><i class="lni lni-bookmark"></i> Başlık</th>
                                        <th><i class="lni lni-user"></i> Yazar</th>
                                        <th><i class="lni lni-image"></i> Kapak</th>
                                        <th><i class="lni lni-files"></i> PDF</th>
                                        <th><i class="lni lni-cog"></i> İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                    <tr>
                                        <td>
                                            <span class="table-id">#{{ $book->id }}</span>
                                        </td>
                                        <td>
                                            <div class="table-title">
                                                <strong>{{ $book->title }}</strong>
                                                @if($book->description)
                                                    <small class="text-muted d-block">{{ Str::limit($book->description, 50) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="table-author">{{ $book->author ?? 'Belirtilmemiş' }}</span>
                                        </td>
                                        <td>
                                            @if($book->cover_image)
                                                <div class="table-image">
                                                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Kapak">
                                                </div>
                                            @else
                                                <div class="table-no-image">
                                                    <i class="lni lni-image"></i>
                                                    <span>Kapak yok</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->pdf_file)
                                                <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank" class="table-file-link">
                                                    <i class="lni lni-files"></i>
                                                    <span>PDF Görüntüle</span>
                                                </a>
                                            @else
                                                <span class="table-no-file">
                                                    <i class="lni lni-close"></i>
                                                    PDF yok
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('admin.books.show', $book) }}" class="btn-action btn-view" title="Görüntüle">
                                                    <i class="lni lni-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.books.edit', $book) }}" class="btn-action btn-edit" title="Düzenle">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bu kitabı silmek istediğinize emin misiniz?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-delete" title="Sil">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="modern-empty-state">
                        <div class="empty-icon">
                            <i class="lni lni-book"></i>
                        </div>
                        <h3>Henüz kitap eklenmemiş</h3>
                        <p>Sistemde hiç kitap bulunmuyor. İlk kitabınızı eklemek için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('admin.books.create') }}" class="btn btn-modern btn-primary">
                            <i class="lni lni-plus"></i> İlk Kitabı Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 