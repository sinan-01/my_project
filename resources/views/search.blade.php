<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arama Sonuçları - GYMD YAYINLARI</title>
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
                    <input type="text" placeholder="Axtar..." value="{{ $query }}">
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
                    <input type="text" placeholder="Axtar..." value="{{ $query }}">
                    <div class="search-icon">
                        <img src="{{ asset('images/search.svg') }}" alt="Axtar..." class="search-img">
                    </div>
                </div>
            </div>
        </header>

        <!-- Arama sonuçları -->
        <main class="main-content">
            <div class="search-results">
                <div class="search-header">
                    <h1>"{{ $query }}" üçün arama nəticələri</h1>
                    <p>{{ $books->count() + $journals->count() }} nəticə tapıldı</p>
                </div>

                <!-- Kitablar -->
                @if($books->count() > 0)
                    <section class="search-section">
                        <h2>Kitablar ({{ $books->count() }})</h2>
                        <div class="search-books-grid">
                            @foreach($books as $book)
                                <div class="search-book-card">
                                    <div class="book-image">
                                        @if($book->cover_image)
                                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
                                        @else
                                            <img src="{{ asset('images/books/default-book.jpg') }}" alt="{{ $book->title }}">
                                        @endif
                                        @if($book->pdf_file)
                                            <div class="pdf-badge">📖 PDF</div>
                                        @endif
                                    </div>
                                    <div class="book-info">
                                        <h3>{{ $book->title }}</h3>
                                        <p class="author">{{ $book->author ?? 'Yazar Belirtilmemiş' }}</p>
                                        @if($book->description)
                                            <p class="description">{{ Str::limit($book->description, 100) }}</p>
                                        @endif
                                        @if($book->pdf_file)
                                            <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank" class="read-btn">
                                                Oxu
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Jurnallar -->
                @if($journals->count() > 0)
                    <section class="search-section">
                        <h2>Jurnallar ({{ $journals->count() }})</h2>
                        <div class="search-journals-grid">
                            @foreach($journals as $journal)
                                <div class="search-journal-card">
                                    <div class="journal-image">
                                        @if($journal->cover_image)
                                            <img src="{{ asset('storage/' . $journal->cover_image) }}" alt="{{ $journal->title }}">
                                        @else
                                            <img src="{{ asset('images/default-journal.jpg') }}" alt="{{ $journal->title }}">
                                        @endif
                                        @if($journal->pdf_file)
                                            <div class="pdf-badge">📖 PDF</div>
                                        @endif
                                    </div>
                                    <div class="journal-info">
                                        <h3>{{ $journal->title }}</h3>
                                        @if($journal->description)
                                            <p class="description">{{ Str::limit($journal->description, 100) }}</p>
                                        @endif
                                        @if($journal->pdf_file)
                                            <a href="{{ asset('storage/' . $journal->pdf_file) }}" target="_blank" class="read-btn">
                                                Oxu
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Sonuç yoksa -->
                @if($books->count() == 0 && $journals->count() == 0)
                    <div class="no-results">
                        <div class="no-results-icon">🔍</div>
                        <h2>Heçbir nəticə tapılmadı</h2>
                        <p>"{{ $query }}" üçün heçbir kitab və ya jurnal tapılmadı.</p>
                        <div class="suggestions">
                            <h3>Tövsiyələr:</h3>
                            <ul>
                                <li>Fərqli açar sözlər sınayın</li>
                                <li>Daha qısa açar sözlər istifadə edin</li>
                                <li>Yazım xətalarını yoxlayın</li>
                            </ul>
                        </div>
                        <a href="{{ route('index') }}" class="back-home-btn">Ana səhifəyə qayıt</a>
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
        
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" title="Yukarı Çık"></button>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>