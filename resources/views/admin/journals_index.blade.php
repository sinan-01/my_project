@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">📄 Jurnallar Yönetimi</h1>
                        <p class="modern-subtitle">Tüm jurnalları görüntüleyin, düzenleyin ve yenilerini ekleyin</p>
                    </div>
                    <a href="{{ route('admin.journals.create') }}" class="btn btn-outline-light btn-modern">
                        <i class="lni lni-plus"></i> Yeni Jurnal Ekle
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

                @if($journals->count() > 0)
                    <!-- Stats Header -->
                    <div class="content-stats">
                        <div class="stat-item">
                            <i class="lni lni-library"></i>
                            <div>
                                <span class="stat-number">{{ $journals->count() }}</span>
                                <span class="stat-label">Toplam Jurnal</span>
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
                                        <th><i class="lni lni-image"></i> Kapak</th>
                                        <th><i class="lni lni-files"></i> PDF</th>
                                        <th><i class="lni lni-cog"></i> İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($journals as $journal)
                                    <tr>
                                        <td>
                                            <span class="table-id">#{{ $journal->id }}</span>
                                        </td>
                                        <td>
                                            <div class="table-title">
                                                <strong>{{ $journal->title }}</strong>
                                                @if($journal->description)
                                                    <small class="text-muted d-block">{{ Str::limit($journal->description, 50) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($journal->cover_image)
                                                <div class="table-image">
                                                    <img src="{{ asset('storage/' . $journal->cover_image) }}" alt="Kapak">
                                                </div>
                                            @else
                                                <div class="table-no-image">
                                                    <i class="lni lni-image"></i>
                                                    <span>Kapak yok</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($journal->pdf_file)
                                                <a href="{{ asset('storage/' . $journal->pdf_file) }}" target="_blank" class="table-file-link">
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
                                                <a href="{{ route('admin.journals.show', $journal) }}" class="btn-action btn-view" title="Görüntüle">
                                                    <i class="lni lni-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.journals.edit', $journal) }}" class="btn-action btn-edit" title="Düzenle">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.journals.destroy', $journal) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bu jurnali silmek istediğinize emin misiniz?')">
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
                            <i class="lni lni-library"></i>
                        </div>
                        <h3>Henüz jurnal eklenmemiş</h3>
                        <p>Sistemde hiç jurnal bulunmuyor. İlk jurnalinizi eklemek için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('admin.journals.create') }}" class="btn btn-modern btn-primary">
                            <i class="lni lni-plus"></i> İlk Jurnali Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 