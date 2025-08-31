@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">🕌 Günün Ayeti Yönetimi</h1>
                        <p class="modern-subtitle">Tüm ayetleri görüntüleyin, düzenleyin ve yenilerini ekleyin</p>
                    </div>
                    <a href="{{ route('admin.verses.create') }}" class="btn btn-outline-light btn-modern">
                        <i class="lni lni-plus"></i> Yeni Ayet Ekle
                    </a>
                </div>
            </div>

            <!-- Daily Verse Status -->
            @php
                $dailyVerse = \App\Models\Verse::getDailyVerse();
                $totalVerses = \App\Models\Verse::count();
            @endphp
            
            <div class="modern-daily-status">
                @if($dailyVerse)
                    <div class="daily-status-card verse-status">
                        <div class="status-header">
                            <div class="status-icon">
                                <i class="lni lni-calendar"></i>
                            </div>
                            <div class="status-info">
                                <h5>Bugün Gösterilen Ayet</h5>
                                <span class="status-badge">✨ Aktif</span>
                            </div>
                        </div>
                        <div class="status-content">
                            <p class="daily-text">"{{ Str::limit($dailyVerse->text, 150) }}"</p>
                            <div class="status-footer">
                                <span class="status-source">Kaynak: {{ $dailyVerse->source ?? 'Kuran-ı Kerim' }}</span>
                                <span class="status-count">✓ {{ $totalVerses }} ayet sistemde - Her gün otomatik değişir</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="daily-status-card warning-status">
                        <div class="status-header">
                            <div class="status-icon">
                                <i class="lni lni-warning"></i>
                            </div>
                            <div class="status-info">
                                <h5>Henüz Ayet Eklenmemiş</h5>
                                <span class="status-badge warning">⚠ Dikkat</span>
                            </div>
                        </div>
                        <div class="status-content">
                            <p>Sistemde henüz hiç ayet bulunmuyor. İlk ayetinizi eklemek için yukarıdaki butonu kullanın.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modern Content Card -->
            <div class="modern-content-card">
                @if(session('success'))
                    <div class="modern-alert modern-alert-success">
                        <i class="lni lni-checkmark-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($verses->count() > 0)
                    <!-- Stats Header -->
                    <div class="content-stats">
                        <div class="stat-item">
                            <i class="lni lni-quotation"></i>
                            <div>
                                <span class="stat-number">{{ $verses->count() }}</span>
                                <span class="stat-label">Toplam Ayet</span>
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
                                        <th><i class="lni lni-quotation"></i> Ayet Metni</th>
                                        <th><i class="lni lni-bookmark"></i> Kaynak</th>
                                        <th><i class="lni lni-image"></i> Görsel</th>
                                        <th><i class="lni lni-cog"></i> İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($verses as $verse)
                                    <tr>
                                        <td>
                                            <span class="table-id">#{{ $verse->id }}</span>
                                        </td>
                                        <td>
                                            <div class="table-text-content">
                                                <p class="verse-text">{{ Str::limit($verse->text, 120) }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="table-source">{{ $verse->source ?? 'Belirtilmemiş' }}</span>
                                        </td>
                                        <td>
                                            @if($verse->image)
                                                <div class="table-image">
                                                    <img src="{{ asset('storage/' . $verse->image) }}" alt="Görsel">
                                                </div>
                                            @else
                                                <div class="table-no-image">
                                                    <i class="lni lni-image"></i>
                                                    <span>Görsel yok</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('admin.verses.edit', $verse) }}" class="btn-action btn-edit" title="Düzenle">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.verses.destroy', $verse) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bu ayeti silmek istediğinize emin misiniz?')">
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
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h3>Henüz ayet eklenmemiş</h3>
                        <p>Sistemde hiç ayet bulunmuyor. İlk ayetinizi eklemek için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('admin.verses.create') }}" class="btn btn-modern btn-primary">
                            <i class="lni lni-plus"></i> İlk Ayeti Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 