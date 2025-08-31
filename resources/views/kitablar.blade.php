<!-- resources/views/kitablar.blade.php -->

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
        
        <!-- kitablar -->
        <main class="main-content">
            <!--book-cards -->
            <div class="books-container">
                @if($books->count() > 0)
                    @foreach($books as $book)
                        @if($book->pdf_file)
                            <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank" class="book_1">
                        @else
                            <a href="#" class="book_1">
                        @endif
                            <div class="book">
                                <p class="book-title">{{ $book->title }}</p>
                                <p class="book-author">{{ $book->author ?? 'Müəllif göstərilməmiş' }}</p>
                                <div class="cover">
                                    @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="cover-image">
                                    @else
                                        <img src="{{ asset('images/books/default-book.jpg') }}" alt="{{ $book->title }}" class="cover-image">
                                    @endif
                                </div>
                                @if($book->pdf_file)
                                    <div class="pdf-indicator">
                                        <span>📖 PDF</span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="no-books">
                        <p>Hələ kitab əlavə edilməmiş.</p>
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
