@php
use Illuminate\Support\Facades\Storage;
@endphp
@extends('admin.app')

@section('content')
<div class="profile-edit-container">
    <!-- Profil Bilgileri Kartı -->
    <div class="profile-card">
        <div class="profile-card-header">
            <h2>Profil Bilgilerini Güncelle</h2>
            <p>Hesap bilgilerinizi ve profil fotoğrafınızı güncelleyin</p>
        </div>
        <div class="profile-card-body">
            @if(session('status') === 'profile-updated')
                <div class="success-message">
                    ✓ Profil bilgileriniz başarıyla güncellendi!
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <!-- Profil Fotoğrafı Bölümü -->
                <div class="profile-photo-section">
                    <div class="form-label">Mevcut Profil Fotoğrafı</div>
                    <div class="current-photo">
                        @if($user->profile_photo && Storage::disk('public')->exists($user->profile_photo))
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profil Fotoğrafı">
                        @else
                            <div class="no-photo-placeholder">
                                <span>Fotoğraf Yok</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="profile_photo" class="form-label">Yeni Profil Fotoğrafı</label>
                        <input id="profile_photo" 
                               name="profile_photo" 
                               type="file" 
                               class="file-input" 
                               accept="image/*">
                        <div class="file-help-text">
                            Desteklenen formatlar: JPEG, PNG, JPG, GIF. Maksimum boyut: 2MB
                        </div>
                        @error('profile_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- İsim -->
                <div class="form-group">
                    <label for="name" class="form-label">İsim</label>
                    <input id="name" 
                           name="name" 
                           type="text" 
                           class="form-input @error('name') is-invalid @enderror" 
                           value="{{ old('name', $user->name) }}" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- E-posta -->
                <div class="form-group">
                    <label for="email" class="form-label">E-posta Adresi</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           class="form-input @error('email') is-invalid @enderror" 
                           value="{{ old('email', $user->email) }}" 
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div style="margin-top: 10px; padding: 10px; background: #fef3c7; border-radius: 6px; color: #92400e; font-size: 0.9rem;">
                            E-posta adresiniz doğrulanmamış. 
                            <form method="post" action="{{ route('verification.send') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: #1d4ed8; text-decoration: underline; cursor: pointer;">
                                    Doğrulama e-postası göndermek için tıklayın.
                                </button>
                            </form>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <div style="margin-top: 10px; padding: 10px; background: #d1fae5; border-radius: 6px; color: #065f46; font-size: 0.9rem;">
                                Yeni bir doğrulama bağlantısı e-posta adresinize gönderildi.
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Butonlar -->
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        Değişiklikleri Kaydet
                    </button>
                    <a href="{{ route('app') }}" class="btn-secondary">
                        İptal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Şifre Güncelleme Kartı -->
    <div class="profile-card">
        <div class="profile-card-header">
            <h2>Şifre Güncelle</h2>
            <p>Hesabınızın güvenliği için güçlü bir şifre kullanın</p>
        </div>
        <div class="profile-card-body">
            @if(session('status') === 'password-updated')
                <div class="success-message">
                    ✓ Şifreniz başarıyla güncellendi!
                </div>
            @endif

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <!-- Mevcut Şifre -->
                <div class="form-group">
                    <label for="update_password_current_password" class="form-label">Mevcut Şifre</label>
                    <input id="update_password_current_password" 
                           name="current_password" 
                           type="password" 
                           class="form-input @error('current_password', 'updatePassword') is-invalid @enderror">
                    @error('current_password', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Yeni Şifre -->
                <div class="form-group">
                    <label for="update_password_password" class="form-label">Yeni Şifre</label>
                    <input id="update_password_password" 
                           name="password" 
                           type="password" 
                           class="form-input @error('password', 'updatePassword') is-invalid @enderror">
                    @error('password', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Şifre Onayı -->
                <div class="form-group">
                    <label for="update_password_password_confirmation" class="form-label">Yeni Şifre Onayı</label>
                    <input id="update_password_password_confirmation" 
                           name="password_confirmation" 
                           type="password" 
                           class="form-input @error('password_confirmation', 'updatePassword') is-invalid @enderror">
                    @error('password_confirmation', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Butonlar -->
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        Şifre Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Profil fotoğrafı önizleme
document.getElementById('profile_photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const currentPhoto = document.querySelector('.current-photo');
            if (currentPhoto) {
                currentPhoto.innerHTML = '<img src="' + e.target.result + '" alt="Yeni Profil Fotoğrafı" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
            }
        };
        reader.readAsDataURL(file);
    }
});

// Form submit animasyonu
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function() {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Kaydediliyor...';
        }
    });
});
</script>
@endsection