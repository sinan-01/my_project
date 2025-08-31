@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">🎭 Slayd Yönetimi</h1>
                        <p class="modern-subtitle">Ana sayfa slider'larını görüntüleyin, düzenleyin ve yenilerini ekleyin</p>
                    </div>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-light btn-modern">
                        <i class="lni lni-plus"></i> Yeni Slayd Ekle
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

                @if($sliders->count() > 0)
                    <!-- Stats Header -->
                    <div class="content-stats">
                        <div class="stat-item">
                            <i class="lni lni-image"></i>
                            <div>
                                <span class="stat-number">{{ $sliders->count() }}</span>
                                <span class="stat-label">Toplam Slayd</span>
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
                                        <th><i class="lni lni-text-format"></i> Başlık</th>
                                        <th><i class="lni lni-text"></i> Açıklama</th>
                                        <th><i class="lni lni-image"></i> Görsel</th>
                                        <th><i class="lni lni-cog"></i> İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <td>
                                            <span class="table-id">#{{ $slider->id }}</span>
                                        </td>
                                        <td>
                                            <div class="table-title">
                                                <strong>{{ $slider->title }}</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-description">
                                                {{ Str::limit($slider->description, 80) }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($slider->image)
                                                <div class="table-slider-image">
                                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slayd Görseli">
                                                    <div class="image-overlay">
                                                        <i class="lni lni-eye"></i>
                                                    </div>
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
                                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn-action btn-edit" title="Düzenle">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bu slaydı silmek istediğinize emin misiniz?')">
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
                            <i class="lni lni-image"></i>
                        </div>
                        <h3>Henüz slayd eklenmemiş</h3>
                        <p>Sistemde hiç slayd bulunmuyor. Ana sayfa için ilk slaydınızı eklemek için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-modern btn-primary">
                            <i class="lni lni-plus"></i> İlk Slaydı Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 