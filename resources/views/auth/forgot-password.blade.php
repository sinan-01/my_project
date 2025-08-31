{{-- Modern Şifre Sıfırlama Sayfası - Login Sayfasıyla Uyumlu --}}
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Admin Panel - Şifre Sıfırlama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%), 
                        linear-gradient(-45deg, rgba(255,255,255,0.1) 25%, transparent 25%), 
                        linear-gradient(45deg, transparent 75%, rgba(255,255,255,0.1) 75%), 
                        linear-gradient(-45deg, transparent 75%, rgba(255,255,255,0.1) 75%);
            background-size: 60px 60px;
            background-position: 0 0, 0 30px, 30px -30px, -30px 0px;
            animation: move 20s linear infinite;
            opacity: 0.3;
        }
        
        @keyframes move {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }
        
        .reset-container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 
                        0 0 60px rgba(255, 255, 255, 0.2) inset;
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-width: 420px;
            width: 100%;
            margin: 20px;
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .logo {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.3);
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .logo::before {
            content: '🔒';
            font-size: 28px;
        }
        
        .title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            font-size: 15px;
            color: #718096;
            margin-bottom: 32px;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
        }
        
        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            outline: none;
        }
        
        .form-input:focus {
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }
        
        .form-input:valid {
            border-color: #48bb78;
        }
        
        .reset-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }
        
        .reset-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .reset-button:hover::before {
            left: 100%;
        }
        
        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.3);
        }
        
        .reset-button:active {
            transform: translateY(0);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
            justify-content: center;
            width: 100%;
        }
        
        .back-link:hover {
            color: #5a67d8;
        }
        
        .success-message {
            background: rgba(72, 187, 120, 0.1);
            border: 2px solid #48bb78;
            color: #2f855a;
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            line-height: 1.5;
            text-align: center;
        }
        
        .error-message {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 6px;
            padding: 8px 12px;
            background: rgba(254, 226, 226, 0.8);
            border-radius: 8px;
            border-left: 4px solid #e53e3e;
        }
        
        /* Responsive Design */
        @media (max-width: 480px) {
            .reset-container {
                padding: 24px;
                margin: 16px;
            }
            
            .title {
                font-size: 24px;
            }
            
            .logo {
                width: 56px;
                height: 56px;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <!-- Logo ve Başlık Bölümü -->
        <div class="logo-section">
            <div class="logo"></div>
            <h1 class="title">Şifre Sıfırlama</h1>
            <p class="subtitle">
                Şifrənizi unutmusunuz? Problem deyil. E-poçt ünvanınızı daxil edin, 
                sizə şifrə sıfırlama əlaqəsi göndərək.
            </p>
        </div>
        
        <!-- Şifre Sıfırlama Formu -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <!-- Başarı Mesajı -->
            @if (session('status'))
                <div class="success-message">
                    ✓ {{ session('status') }}
                </div>
            @endif
            
            <!-- E-posta Alanı -->
            <div class="form-group">
                <label for="email" class="form-label">E-poçt ünvanı</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input" 
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    required 
                    autofocus
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Sıfırlama Butonu -->
            <button type="submit" class="reset-button">
                📧 Şifrə sıfırlama əlaqəsi göndər
            </button>
            
            <!-- Geri Dön Link -->
            <a href="{{ route('login') }}" class="back-link">
                ← Girişə qayıt
            </a>
        </form>
    </div>
    
    <script>
        // Form submission animasyonu
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('.reset-button');
            button.innerHTML = '⏳ Göndərilir...';
        });
        
        // Input focus animasyonları
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
