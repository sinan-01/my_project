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
    <!--book-cards -->
<div class="books-container">
    <a href="#" class="book_1">
        <div class="book">
            <p class="book-title">Kitap Adı 1</p>
            <p class="book-author">Yazar Adı</p>
            <div class="cover">
                <img src="{{ asset('images/books/book1.jpg') }}" alt="Kitap 1" class="cover-image">
            </div>
        </div>
    </a>
    <a href="#" class="book_1">
        <div class="book">
            <p class="book-title">Kitap Adı 2</p>
            <p class="book-author">Yazar Adı</p>
            <div class="cover">
                <img src="{{ asset('images/books/book2.jpg') }}" alt="Kitap 2" class="cover-image">
            </div>
        </div>
    </a>
    <a href="#" class="book_1">
        <div class="book">
            <p class="book-title">Kitap Adı 2</p>
            <p class="book-author">Yazar Adı</p>
            <div class="cover">
                <img src="{{ asset('images/books/book3.jpg') }}" alt="Kitap 2" class="cover-image">
            </div>
        </div>
    </a>
    <a href="#" class="book_1">
        <div class="book">
            <p class="book-title">Kitap Adı 2</p>
            <p class="book-author">Yazar Adı</p>
            <div class="cover">
                <img src="{{ asset('images/books/book4.jpg') }}" alt="Kitap 2" class="cover-image">
            </div>
        </div>
    </a>
    
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book1.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book2.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book3.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book4.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book1.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book2.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book3.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
    <div class="book">
        <p class="book-title">Kitap Adı 2</p>
        <p class="book-author">Yazar Adı</p>
        <div class="cover">
            <img src="{{ asset('images/books/book4.jpg') }}" alt="Kitap 2" class="cover-image">
        </div>
    </div>
</div>

    
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
