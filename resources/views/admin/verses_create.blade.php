@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">🕌 Yeni Ayet Ekle</h1>
                        <p class="modern-subtitle">Günün ayeti için yeni ayet ekleyin</p>
                    </div>
                    <a href="{{ route('admin.verses.index') }}" class="btn btn-outline-secondary btn-modern">
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

                <form action="{{ route('admin.verses.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Ayet İçeriği -->
                            <div class="modern-form-section">
                                <h4 class="section-title">🕌 Ayet İçeriği</h4>
                                
                                <div class="modern-form-group">
                                    <label for="text" class="modern-label">Ayet Metni *</label>
                                    <textarea class="modern-textarea @error('text') is-invalid @enderror" 
                                              id="text" name="text" rows="6" 
                                              placeholder="Ayet metnini yazın..." required>{{ old('text') }}</textarea>
                                    @error('text')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="source" class="modern-label">Kaynak (Sure:Ayet)</label>
                                    <input type="text" class="modern-input @error('source') is-invalid @enderror" 
                                           id="source" name="source" value="{{ old('source') }}"
                                           placeholder="Fatiha:1, Bakara:255, İhlas:1 vb.">
                                    @error('source')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Görsel Yüklemesi -->
                            <div class="modern-form-section">
                                <h4 class="section-title">🎨 Görsel (Opsiyonel)</h4>
                                
                                <div class="modern-form-group">
                                    <label for="image" class="modern-label">Görsel Dosyası</label>
                                    <div class="modern-file-upload">
                                        <input type="file" class="modern-file-input" 
                                               id="image" name="image" accept="image/*">
                                        <label for="image" class="modern-file-label">
                                            <i class="lni lni-cloud-upload"></i>
                                            <span>Görsel seçin</span>
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
                                            <li>Ayet metni doğru yazılmalı</li>
                                            <li>Sure ve ayet numarası belirtilmeli</li>
                                            <li>Görsel ayetle ilgili olmalı</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="modern-form-actions">
                        <a href="{{ route('admin.verses.index') }}" class="btn btn-modern btn-secondary">
                            <i class="lni lni-close"></i> İptal
                        </a>
                        <button type="submit" class="btn btn-modern btn-primary">
                            <i class="lni lni-checkmark"></i> Ayet Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection