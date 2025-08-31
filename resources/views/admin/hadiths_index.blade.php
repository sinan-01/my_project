@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">📜 Günün Hadisi Yönetimi</h1>
                        <p class="modern-subtitle">Tüm hadisleri görüntüleyin, düzenleyin ve yenilerini ekleyin</p>
                    </div>
                    <a href="{{ route('admin.hadiths.create') }}" class="btn btn-outline-light btn-modern">
                        <i class="lni lni-plus"></i> Yeni Hadis Ekle
                    </a>
                </div>
            </div>

            <!-- Daily Hadith Status -->
            @php
                $dailyHadith = \App\Models\Hadith::getDailyHadith();
                $totalHadiths = \App\Models\Hadith::count();
            @endphp
            
            <div class="modern-daily-status">
                @if($dailyHadith)
                    <div class="daily-status-card hadith-status">
                        <div class="status-header">
                            <div class="status-icon">
                                <i class="lni lni-calendar"></i>
                            </div>
                            <div class="status-info">
                                <h5>Bugün Gösterilen Hadis</h5>
                                <span class="status-badge">✨ Aktif</span>
                            </div>
                        </div>
                        <div class="status-content">
                            <p class="daily-text">"{{ Str::limit($dailyHadith->text, 150) }}"</p>
                            <div class="status-footer">
                                <span class="status-source">Kaynak: {{ $dailyHadith->source ?? 'Hz. Muhammed (s.a.v.)' }}</span>
                                <span class="status-count">✓ {{ $totalHadiths }} hadis sistemde - Her gün otomatik değişir</span>
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
                                <h5>Henüz Hadis Eklenmemiş</h5>
                                <span class="status-badge warning">⚠ Dikkat</span>
                            </div>
                        </div>
                        <div class="status-content">
                            <p>Sistemde henüz hiç hadis bulunmuyor. İlk hadisinizi eklemek için yukarıdaki butonu kullanın.</p>
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

                @if($hadiths->count() > 0)
                    <!-- Stats Header -->
                    <div class="content-stats">
                        <div class="stat-item">
                            <i class="lni lni-quotation"></i>
                            <div>
                                <span class="stat-number">{{ $hadiths->count() }}</span>
                                <span class="stat-label">Toplam Hadis</span>
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
                                        <th><i class="lni lni-quotation"></i> Hadis Metni</th>
                                        <th><i class="lni lni-user"></i> Kaynak</th>
                                        <th><i class="lni lni-image"></i> Görsel</th>
                                        <th><i class="lni lni-cog"></i> İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hadiths as $hadith)
                                    <tr>
                                        <td>
                                            <span class="table-id">#{{ $hadith->id }}</span>
                                        </td>
                                        <td>
                                            <div class="table-text-content">
                                                <p class="hadith-text">{{ Str::limit($hadith->text, 120) }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="table-source">{{ $hadith->source ?? 'Belirtilmemiş' }}</span>
                                        </td>
                                        <td>
                                            @if($hadith->image)
                                                <div class="table-image">
                                                    <img src="{{ asset('storage/' . $hadith->image) }}" alt="Görsel">
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
                                                <a href="{{ route('admin.hadiths.edit', $hadith) }}" class="btn-action btn-edit" title="Düzenle">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.hadiths.destroy', $hadith) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bu hadisi silmek istediğinize emin misiniz?')">
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
                        <h3>Henüz hadis eklenmemiş</h3>
                        <p>Sistemde hiç hadis bulunmuyor. İlk hadisinizi eklemek için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('admin.hadiths.create') }}" class="btn btn-modern btn-primary">
                            <i class="lni lni-plus"></i> İlk Hadisi Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 