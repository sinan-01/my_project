<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMD YAYINLARI</title>
    @include('frontend.layouts.style')
</head>
<body>
    <!-- header -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="GYMD YAYINLARI" class="logo-img">
                </a>
            </div>
            
            <div class="nav-links">
                <ul>
                    <li><a href="{{ route('index') }}">Əsas</a></li>
                    <li><a href="{{ route('kitablar') }}">Kitablar</a></li>
                    <li><a href="{{ route('jurnallar') }}">Jurnallar</a></li>
                    <li><a href="{{ route('hakkimizda') }}">Hakkımızda</a></li>
                </ul>
            </div>
            
            <div class="search-container">
                <div class="search-icon">
                    <img src="{{ asset('images/search.svg') }}" alt="Ara" class="search-img">
                </div>
                <input type="text" placeholder="Axtar...">
            </div>
            
            <div class="burger-menu">
                <div class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
        
        <div class="mobile-menu">
            <ul>
                <li><a href="{{ route('index') }}">Əsas</a></li>
                <li><a href="{{ route('kitablar') }}">Kitablar</a></li>
                <li><a href="{{ route('jurnallar') }}">Jurnallar</a></li>
                <li><a href="{{ route('hakkimizda') }}">Hakkımızda</a></li>
            </ul>
            <div class="mobile-search">
                <input type="text" placeholder="Axtar...">
                <div class="search-icon">
                    <img src="{{ asset('images/search.svg') }}" alt="Axtar..." class="search-img">
                </div>
            </div>
        </div>
    </header>
    
    <!-- slider -->
    <section class="hero-section">
        <div class="slider-container">
            <div class="slider">
                <div class="slide active">
                    <img src="{{ asset('images/slide1.jpg') }}" alt="Slider Resim 1">
                    <div class="slide-content">
                        <h2>GYMD Yayınları</h2>
                        <p>Keyfiyyətli kitablar və jurnallar</p>
                        <a href="#featured" class="scroll-btn">kəşf edin</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/slide2.jpg') }}" alt="Slider Resim 2">
                    <div class="slide-content">
                        <h2>Yeni Kitablar</h2>
                        <p>En son yayınlarımız</p>
                        <a href="#featured" class="scroll-btn">kəşf edin</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/slide3.jpg') }}" alt="Slider Resim 3">
                    <div class="slide-content">
                        <h2>Populyar Jurnallar</h2>
                        <p>Ən çox oxunan jurnallarımız</p>
                        <a href="#featured" class="scroll-btn">kəşf edin</a>
                    </div>
                </div>
                <button class="slider-btn prev-btn">&#10094;</button>
                <button class="slider-btn next-btn">&#10095;</button>
                <div class="slider-dots">
                    <span class="dot active" data-index="0"></span>
                    <span class="dot" data-index="1"></span>
                    <span class="dot" data-index="2"></span>
                </div>
            </div>
        </div>
        
        <div class="daily-quote">
            <div class="quote-container">
                <div class="quote-tabs">
                    <button class="tab-btn active" data-tab="hadis">Günün Hədisi</button>
                    <button class="tab-btn" data-tab="ayet">Günün Ayəti</button>
                </div>
                <div class="quote-content">
                    <div class="quote-item active" id="hadis">
                        <div class="quote-icon">
                            <img src="{{ asset('images/islam.svg') }}" alt="Hadis İkonu">
                        </div>
                        <h3>Günün Hədisi</h3> 
                        <p>"İlim öğrenmek her Müslümana farzdır."</p>
                        <span class="quote-source">- Hz. Muhammed (s.a.v.)</span>
                    </div>
                    <div class="quote-item" id="ayet">
                        <div class="quote-icon">
                            <img src="{{ asset('images/islam.svg') }}" alt="Ayet İkonu">
                        </div>
                        <h3>Günün Ayəti</h3>
                        <p>"Hiç bilenlerle bilmeyenler bir olur mu?"</p>
                        <span class="quote-source">- Zümer Suresi, 9. Ayet</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Özellikli içerik bölümü -->
    <section id="featured" class="featured-section">
        <h2 class="section-title">Öne Çıxan Yayınlar</h2>
        <div class="featured-content">
            <!-- kitablar ve jurnallar cardi -->
            <section class="cards-container">
                <div class="card">
                    <span></span>
                    <div class="card-image">
                        <img src="{{ asset('images/card1.jpg') }}" alt="Card Resim 1">
                    </div>
                    <div class="content">
                        <h2>Kitablar</h2>
                        <p>Kart içeriği açıklaması burada yer alacak.</p>
                        <a href="{{ route('kitablar') }}" class="card-btn">Detaylar</a>
                    </div>
                </div>
                
                <div class="card">
                    <span></span>
                    <div class="card-image">
                        <img src="{{ asset('images/card2.jpg') }}" alt="Card Resim 2">
                    </div>
                    <div class="content">
                        <h2>Jurnallar</h2>
                        <p>Kart içeriği açıklaması burada yer alacak.</p>
                        <a href="{{ route('jurnallar') }}" class="card-btn">Detaylar</a>
                    </div>
                </div>
            </section>
        </div>
    </section>
    
    <!-- footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-links">
                <h4>Bağlantılar</h4>
                <ul>
                    <li><a href="{{ route('kitablar') }}">Kitablar</a></li>
                    <li><a href="{{ route('jurnallar') }}">Jurnallar</a></li>
                    <li><a href="{{ route('hakkimizda') }}">Hakkımızda</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Əlaqə</h4>
                <p>Email: info@gymdyayinlari.com</p>
                <p>Telefon: +994 12 345 67 89</p>
            </div>
            <div class="footer-social">
                <h4>Sosial Medya</h4>
                <ul>
                    <li><a href="#"><img src="{{ asset('images/icons8-facebook.svg') }}" alt="Facebook"></a></li>
                    <li><a href="#"><img src="{{ asset('images/icons8-instagram.svg') }}" alt="Instagram"></a></li>
                    <li><a href="#"><img src="{{ asset('images/icons8-youtube.svg') }}" alt="YouTube"></a></li>
                    <li><a href="#"><img src="{{ asset('images/icons8-tiktok.svg') }}" alt="Tiktok"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 GYMD YAYINLARI. Bütün hüquqlar qorunur.</p>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>