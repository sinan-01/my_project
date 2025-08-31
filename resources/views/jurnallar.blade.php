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
    
    <!-- içerik -->
    <main class="container main-content">
        <div class="journals-header">
            <h1>Jurnallarımız</h1>
            <p>Keyfiyyətli jurnallarımızı kəşf edin</p>
        </div>
        
        <div class="journals-grid">
            @if($journals->count() > 0)
                @foreach($journals as $journal)
                    <div class="journal-card">
                        <div class="journal-image">
                            @if($journal->cover_image)
                                <img src="{{ asset('storage/' . $journal->cover_image) }}" alt="{{ $journal->title }}">
                            @else
                                <img src="{{ asset('images/default-journal.jpg') }}" alt="{{ $journal->title }}">
                            @endif
                            <div class="journal-overlay">
                                <div class="journal-info">
                                    <h3>{{ $journal->title }}</h3>
                                    @if($journal->description)
                                        <p>{{ Str::limit($journal->description, 100) }}</p>
                                    @endif
                                    @if($journal->pdf_file)
                                        <a href="{{ asset('storage/' . $journal->pdf_file) }}" target="_blank" class="read-btn">
                                            <span>📖 Oxu</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Varsayılan jurnallar -->
                <div class="journal-card">
                    <div class="journal-image">
                        <img src="{{ asset('images/ugur.jpg') }}" alt="ugur">
                        <div class="journal-overlay">
                            <div class="journal-info">
                                <h3>Uğur</h3>
                                <a href="{{ route('ugur') }}" class="read-btn">
                                    <span>📖 Oxu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="journal-card">
                    <div class="journal-image">
                        <img src="{{ asset('images/gulustan.jpg') }}" alt="gulustan">
                        <div class="journal-overlay">
                            <div class="journal-info">
                                <h3>Gülüstan</h3>
                                <a href="{{ route('gulustan') }}" class="read-btn">
                                    <span>📖 Oxu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="journal-card">
                    <div class="journal-image">
                        <img src="{{ asset('images/tebessum.jpg') }}" alt="tebessum">
                        <div class="journal-overlay">
                            <div class="journal-info">
                                <h3>Təbəssüm</h3>
                                <a href="{{ route('tebessum') }}" class="read-btn">
                                    <span>📖 Oxu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
    
    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" title="Yukarı Çık"></button>
    
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>