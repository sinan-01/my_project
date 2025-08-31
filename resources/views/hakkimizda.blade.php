<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMD YAYINLARI</title>
    @include('frontend.layouts.style')
</head>
<body>
    <div class="wrapper">
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
        
        <main class="main-content">
            <div class="about-main">
                <div class="about-container">
                    <div class="about-header">
                        <h1>Haqqımızda</h1>
                        <p>GYMD Yayınları olaraq missiyamız və vizyonamız</p>
                    </div>
                    
                    <div class="about-content">
                        <div class="about-section">
                            <div class="about-text">
                                <h2>Biz Kimiz?</h2>
                                <p>GYMD Yayınları, 2020 yılında kurulmuş, Azerbaycan'ın önde gelen yayınevlerinden biridir. İslami literatür, eğitim materyalleri ve kültürel yayınlar konusunda uzmanlaşmış olan yayınevimiz, toplumun manevi ve entelektüel gelişimine katkıda bulunmayı hedeflemektedir.</p>
                            </div>
                            <div class="about-image">
                                <img src="{{ asset('images/about-us.jpg') }}" alt="GYMD Yayınları" onerror="this.style.display='none'">
                            </div>
                        </div>
                        
                        <div class="about-section reverse">
                            <div class="about-text">
                                <h2>Misyonumuz</h2>
                                <p>Kaliteli ve güvenilir içerik üreterek, okuyucularımıza en iyi hizmeti sunmak. İslami değerleri koruyarak, modern dünyanın ihtiyaçlarına uygun yayınlar hazırlamak ve toplumun manevi gelişimine katkıda bulunmak.</p>
                            </div>
                            <div class="about-image">
                                <img src="{{ asset('images/mission.jpg') }}" alt="Misyonumuz" onerror="this.style.display='none'">
                            </div>
                        </div>
                        
                        <div class="about-section">
                            <div class="about-text">
                                <h2>Vizyonamız</h2>
                                <p>Azərbaycanın ən etibarly və saygın nəşriyyatlarından biri olmaq. Beynəlxalq standartlarda yayınlar istehsal edərək, regional və beynəlxalq bazarda tanınmaq və oxucularımızın etibarını qazanmaq.</p></p>
                            </div>
                            <div class="about-image">
                                <img src="{{ asset('images/vision.jpg') }}" alt="Vizyonumuz" onerror="this.style.display='none'">
                            </div>
                        </div>
                    </div>
                    
                    <div class="stats-section">
                        <h2>Rakamlarla GYMD</h2>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-number">100+</div>
                                <div class="stat-label">Yayınlanan Kitap</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Jurnal Sayısı</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">10K+</div>
                                <div class="stat-label">Mutlu Okuyucu</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">5</div>
                                <div class="stat-label">Yıllık Deneyim</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-section">
                        <h2>İletişim</h2>
                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-icon">📧</div>
                                <h3>E-posta</h3>
                                <p>info@gymdyayinlari.com</p>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">📞</div>
                                <h3>Telefon</h3>
                                <p>+994 12 345 67 89</p>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">📍</div>
                                <h3>Adres</h3>
                                <p>Rustavi, Gürcüstan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
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
                <p>GYMD yayinalri.ge © 2025 | Created By: <a href="https://www.instagram.com/allakhverdov.s/" target="_blank">SACode</a></p>
            </div>
        </footer>
    </div>
    
    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" title="Yukarı Çık"></button>
    
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
