@extends('admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Modern Header -->
            <div class="modern-page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="modern-title">📄 Yeni Jurnal Ekle</h1>
                        <p class="modern-subtitle">Jurnal bilgilerini doldurun ve sisteme ekleyin</p>
                    </div>
                    <a href="{{ route('admin.journals.index') }}" class="btn btn-outline-secondary btn-modern">
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

                <form action="{{ route('admin.journals.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Jurnal Bilgileri -->
                            <div class="modern-form-section">
                                <h4 class="section-title">📃 Jurnal Bilgileri</h4>
                                
                                <div class="modern-form-group">
                                    <label for="title" class="modern-label">Başlık *</label>
                                    <input type="text" class="modern-input @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" 
                                           placeholder="Jurnal başlığını girin" required>
                                    @error('title')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="description" class="modern-label">Açıklama</label>
                                    <textarea class="modern-textarea @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4"
                                              placeholder="Jurnal hakkında kısa bir açıklama yazın">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Dosya Yüklemeleri -->
                            <div class="modern-form-section">
                                <h4 class="section-title">📁 Dosya Yüklemeleri</h4>
                                
                                <div class="modern-form-group">
                                    <label for="cover_image" class="modern-label">Kapak Görseli</label>
                                    <div class="modern-file-upload">
                                        <input type="file" class="modern-file-input" 
                                               id="cover_image" name="cover_image" accept="image/*">
                                        <label for="cover_image" class="modern-file-label">
                                            <i class="lni lni-cloud-upload"></i>
                                            <span>Kapak görselini seçin</span>
                                            <small>JPEG, PNG, JPG, GIF - Max: 2MB</small>
                                        </label>
                                    </div>
                                    @error('cover_image')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="pdf_file" class="modern-label">PDF Dosyası</label>
                                    <div class="modern-file-upload">
                                        <input type="file" class="modern-file-input" 
                                               id="pdf_file" name="pdf_file" accept=".pdf">
                                        <label for="pdf_file" class="modern-file-label">
                                            <i class="lni lni-files"></i>
                                            <span>PDF dosyasını seçin</span>
                                            <small>PDF formatı - Max: 10MB</small>
                                        </label>
                                    </div>
                                    @error('pdf_file')
                                        <div class="modern-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="modern-form-actions">
                        <a href="{{ route('admin.journals.index') }}" class="btn btn-modern btn-secondary">
                            <i class="lni lni-close"></i> İptal
                        </a>
                        <button type="submit" class="btn btn-modern btn-primary">
                            <i class="lni lni-checkmark"></i> Jurnal Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection