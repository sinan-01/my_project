@extends('admin.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-header">
                <h1 class="dashboard-title">📊 Admin Panel</h1>
                <p class="dashboard-subtitle">GYMD İdarə Panelinə Xoş Gəlmisiniz</p>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <!-- Günün Hadisi Kartı -->
        <div class="col-xl-6 col-lg-6">
            <div class="stats-card hadith-card">
                <div class="card-header-custom">
                    <div class="card-icon">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <div class="card-title">
                        <h5>Günün Hədisi</h5>
                        <span class="card-subtitle">Bugünkü hədis məzmunu</span>
                    </div>
                </div>
                <div class="card-content">
                    @php
                        try {
                            $dailyHadith = \App\Models\Hadith::getDailyHadith();
                            $totalHadiths = \App\Models\Hadith::count();
                        } catch (Exception $e) {
                            $dailyHadith = null;
                            $totalHadiths = 0;
                        }
                    @endphp
                    
                    @if($dailyHadith)
                        <div class="content-preview">
                            <p class="content-text">"{{ Str::limit($dailyHadith->text, 120) }}"</p>
                            <span class="content-source">{{ $dailyHadith->source ?? 'Hz. Muhammed (s.a.v.)' }}</span>
                        </div>
                        <div class="card-stats">
                            <div class="stat-item">
                                <span class="stat-number">{{ $totalHadiths }}</span>
                                <span class="stat-label">Cəmi Hədis</span>
                            </div>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="lni lni-warning"></i>
                            <p>Hələ hədis əlavə edilməmiş!</p>
                            <a href="{{ route('admin.hadiths.create') }}" class="btn btn-primary btn-sm">İlk hədisi əlavə et</a>
                        </div>
                    @endif
                    
                    <div class="card-actions">
                        <a href="{{ route('admin.hadiths.index') }}" class="btn btn-outline-primary">Hədisləri idarə et</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Günün Ayeti Kartı -->
        <div class="col-xl-6 col-lg-6">
            <div class="stats-card verse-card">
                <div class="card-header-custom">
                    <div class="card-icon">
                        <i class="lni lni-book"></i>
                    </div>
                    <div class="card-title">
                        <h5>Günün Ayəsi</h5>
                        <span class="card-subtitle">Bugünkü ayə məzmunu</span>
                    </div>
                </div>
                <div class="card-content">
                    @php
                        try {
                            $dailyVerse = \App\Models\Verse::getDailyVerse();
                            $totalVerses = \App\Models\Verse::count();
                        } catch (Exception $e) {
                            $dailyVerse = null;
                            $totalVerses = 0;
                        }
                    @endphp
                    
                    @if($dailyVerse)
                        <div class="content-preview">
                            <p class="content-text">"{{ Str::limit($dailyVerse->text, 120) }}"</p>
                            <span class="content-source">{{ $dailyVerse->source ?? 'Kuran-ı Kerim' }}</span>
                        </div>
                        <div class="card-stats">
                            <div class="stat-item">
                                <span class="stat-number">{{ $totalVerses }}</span>
                                <span class="stat-label">Cəmi Ayə</span>
                            </div>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="lni lni-warning"></i>
                            <p>Hələ ayə əlavə edilməmiş!</p>
                            <a href="{{ route('admin.verses.create') }}" class="btn btn-success btn-sm">İlk ayəni əlavə et</a>
                        </div>
                    @endif
                    
                    <div class="card-actions">
                        <a href="{{ route('admin.verses.index') }}" class="btn btn-outline-success">Ayələri idarə et</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="quick-actions-card">
                <div class="card-header-custom">
                    <div class="card-icon">
                        <i class="lni lni-bolt"></i>
                    </div>
                    <div class="card-title">
                        <h5>Sürətli əməliyyatlar</h5>
                        <span class="card-subtitle">Təz-təz istifadə olunan əməliyyatlar</span>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row g-3">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <a href="{{ route('admin.hadiths.create') }}" class="quick-action-btn hadith-btn">
                                <div class="action-icon">
                                    <i class="lni lni-plus"></i>
                                </div>
                                <span>Hədis əlavə et</span>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <a href="{{ route('admin.verses.create') }}" class="quick-action-btn verse-btn">
                                <div class="action-icon">
                                    <i class="lni lni-plus"></i>
                                </div>
                                <span>Ayə əlavə et</span>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <a href="{{ route('admin.books.create') }}" class="quick-action-btn book-btn">
                                <div class="action-icon">
                                    <i class="lni lni-plus"></i>
                                </div>
                                <span>Kitab əlavə et</span>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <a href="{{ route('admin.sliders.create') }}" class="quick-action-btn slider-btn">
                                <div class="action-icon">
                                    <i class="lni lni-plus"></i>
                                </div>
                                <span>Slayd əlavə et</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Information Card -->
    <div class="row">
        <div class="col-12">
            <div class="info-card">
                <div class="info-icon">
                    <i class="lni lni-information"></i>
                </div>
                <div class="info-content">
                    <h6>Günlük Hədis/Ayə Sistemi Necə İşləyir?</h6>
                    <ul class="info-list">
                        <li>Sistemə əlavə etdiyiniz hədis və ayələr avtomatik olaraq hər gün dəyişir</li>
                        <li>Bugün göstərilən hədis/ayə sabah dəyişəcək</li>
                        <li>20-30 hədis/ayə əlavə etsəniz, təxminən 1 ay boyunca fərqli məzmun göstərilər</li>
                        <li>Hədis/ayə sayından çox gün keçsə, sistem başdan dövrəyə davam edər</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection