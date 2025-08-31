@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">🎭 Slayd Düzenle</h1>
                        <p class="modern-subtitle">{{ $slider->title }} slaydını düzenleyin</p>
                    </div>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary btn-modern">
                        <i class="lni lni-arrow-left"></i> Geri Dön
                    </a>
                </div>
            </div>

            <!-- Modern Form Card -->
            <div class="modern-form-card">
                @if(session('success'))
                    <div class="modern-alert modern-alert-success">
                        <i class="lni lni-checkmark-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="modern-alert modern-alert-danger">
                        <i class="lni lni-warning"></i>
                        <div>
                            <strong>Lütfen aşağıdaki hataları düzeltin:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Slayd İçeriği -->
                            <div class="modern-form-section">
                                <h4 class="section-title">🎭 Slayd İçeriği</h4>
                                
                                <div class="modern-form-group">
                                    <label for="title" class="modern-label">Başlık *</label>
                                    <input type="text" class="modern-input @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $slider->title) }}" 
                                           placeholder="Slayd başlığını girin" required>
                                    @error('title')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="description" class="modern-label">Açıklama</label>
                                    <textarea class="modern-textarea @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4"
                                              placeholder="Slayd açıklamasını yazın">{{ old('description', $slider->description) }}</textarea>
                                    @error('description')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Görsel Yüklemesi -->
                            <div class="modern-form-section">
                                <h4 class="section-title">🎨 Slayd Görseli</h4>
                                
                                <!-- Mevcut Görsel -->
                                @if($slider->image)
                                    <div class="current-image-preview">
                                        <label class="modern-label">Mevcut Görsel</label>
                                        <div class="current-image-card">
                                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Mevcut Slayd Görseli">
                                            <div class="image-info">
                                                <span class="image-filename">{{ basename($slider->image) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="modern-form-group">
                                    <label for="image" class="modern-label">{{ $slider->image ? 'Yeni Görsel (Opsiyonel)' : 'Görsel Dosyası *' }}</label>
                                    <div class="modern-file-upload">
                                        <input type="file" class="modern-file-input" 
                                               id="image" name="image" accept="image/*">
                                        <label for="image" class="modern-file-label">
                                            <i class="lni lni-cloud-upload"></i>
                                            <span>{{ $slider->image ? 'Yeni görsel seçin' : 'Slayd görselini seçin' }}</span>
                                            <small>JPEG, PNG, JPG, GIF - Max: 2MB</small>
                                        </label>
                                    </div>
                                    @error('image')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Info Card -->
                                <div class="modern-info-card">
                                    <i class="lni lni-information"></i>
                                    <div>
                                        <strong>İpuçları:</strong>
                                        <ul class="mb-0">
                                            <li>Optimal boyut: 1920x800 piksel</li>
                                            <li>Yüksek kaliteli görsel kullanın</li>
                                            <li>Metin okunabilir olmalı</li>
                                            <li>Mobil uyumlu tasarlayın</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="modern-form-actions">
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-modern btn-secondary">
                            <i class="lni lni-close"></i> İptal
                        </a>
                        <button type="submit" class="btn btn-modern btn-primary">
                            <i class="lni lni-checkmark"></i> Slayd Güncelle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 