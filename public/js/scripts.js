// scripts.js - Basit ve Çalışan JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Burger menü ve mobil menü işlemleri
    const burgerIcon = document.querySelector('.burger-icon');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    // Backdrop oluştur
    let backdrop = document.querySelector('.mobile-menu-backdrop');
    if (!backdrop) {
        backdrop = document.createElement('div');
        backdrop.className = 'mobile-menu-backdrop';
        document.body.appendChild(backdrop);
    }
    
    // Burger menü toggle fonksiyonu
    function toggleMobileMenu() {
        const isOpen = mobileMenu.classList.contains('open');
        
        if (isOpen) {
            // Menüyü kapat
            burgerIcon.classList.remove('open');
            mobileMenu.classList.remove('open');
            backdrop.classList.remove('show');
            document.body.style.overflow = 'auto';
            
            setTimeout(() => {
                if (!mobileMenu.classList.contains('open')) {
                    mobileMenu.style.display = 'none';
                }
            }, 300);
        } else {
            // Menüyü aç
            mobileMenu.style.display = 'flex';
            
            setTimeout(() => {
                burgerIcon.classList.add('open');
                mobileMenu.classList.add('open');
                backdrop.classList.add('show');
                document.body.style.overflow = 'hidden';
            }, 10);
        }
    }
    
    // Burger menü tıklama
    if (burgerIcon) {
        burgerIcon.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });
    }
    
    // Backdrop tıklama - menüyü kapat
    if (backdrop) {
        backdrop.addEventListener('click', function() {
            if (mobileMenu.classList.contains('open')) {
                toggleMobileMenu();
            }
        });
    }
    
    // ESC tuşu ile kapat
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
            toggleMobileMenu();
        }
    });
    
    // Ekran boyutu değiştiğinde menüyü kapat
    window.addEventListener('resize', function() {
        if (window.innerWidth > 767 && mobileMenu.classList.contains('open')) {
            burgerIcon.classList.remove('open');
            mobileMenu.classList.remove('open');
            backdrop.classList.remove('show');
            mobileMenu.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // --------- ARAMA FONKSİYONLARI ---------
    // Arama ikonlarını seç
    const searchIcons = document.querySelectorAll('.search-icon');
    const searchInputs = document.querySelectorAll('input[type="text"]');
    
    // Arama fonksiyonu
    function performSearch(searchTerm) {
        if (searchTerm.trim() === '') {
            alert('Zəhmət olmasa axtarış termini daxil edin.');
            return;
        }
        
        // Arama sonuçları sayfasına yönlendir
        window.location.href = `/search?q=${encodeURIComponent(searchTerm)}`;
    }
    
    // Arama ikonlarına tıklama olayı ekle
    searchIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            // Bu ikonun yanındaki input'u bul
            const searchInput = this.parentElement.querySelector('input[type="text"]') || 
                               this.closest('.mobile-search')?.querySelector('input[type="text"]') ||
                               document.querySelector('.search-container input[type="text"]');
            
            if (searchInput) {
                performSearch(searchInput.value);
            }
        });
    });
    
    // Arama inputlarına Enter tuşu olayı ekle
    searchInputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch(this.value);
            }
        });
    });
  
    // --------- Slider işlemleri ---------
    // Slider değişkenleri
    const slides = document.querySelectorAll('.slide');
    if (slides.length > 0) {
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;
        const slideCount = slides.length;
        
        // Slider otomatik geçiş süresi (ms) - 5 saniye
        const autoSlideInterval = 5000;
        let autoSlideTimer;
        
        // Slider fonksiyonları
        function showSlide(index) {
            if (index < 0) {
                currentSlide = slideCount - 1;
            } else if (index >= slideCount) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }
            
            // Aktif slide'ı güncelle
            slides.forEach(slide => slide.classList.remove('active'));
            slides[currentSlide].classList.add('active');
            
            // Aktif dot'u güncelle
            dots.forEach(dot => dot.classList.remove('active'));
            dots[currentSlide].classList.add('active');
        }
        
        function nextSlide() {
            showSlide(currentSlide + 1);
        }
        
        function prevSlide() {
            showSlide(currentSlide - 1);
        }
        
        function startAutoSlide() {
            stopAutoSlide();
            autoSlideTimer = setInterval(nextSlide, autoSlideInterval);
        }
        
        function stopAutoSlide() {
            if (autoSlideTimer) {
                clearInterval(autoSlideTimer);
            }
        }
        
        // Otomatik slider'ı başlat
        startAutoSlide();
        
        // Slider butonları için event listener'lar
        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function() {
                prevSlide();
                stopAutoSlide();
                startAutoSlide(); // Tıklandıktan sonra otomatik geçişi yeniden başlat
            });
            
            nextBtn.addEventListener('click', function() {
                nextSlide();
                stopAutoSlide();
                startAutoSlide(); // Tıklandıktan sonra otomatik geçişi yeniden başlat
            });
        }
        
        // Slider noktaları için event listener'lar
        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                const slideIndex = parseInt(this.getAttribute('data-index'));
                showSlide(slideIndex);
                stopAutoSlide();
                startAutoSlide(); // Tıklandıktan sonra otomatik geçişi yeniden başlat
            });
        });
        
        // Fare slider üzerine geldiğinde otomatik geçişi durdur
        const sliderContainer = document.querySelector('.slider-container');
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', stopAutoSlide);
            sliderContainer.addEventListener('mouseleave', startAutoSlide);
        }
    }
    
    // --------- Hadis ve Ayet tab değişim işlemleri ---------
    const tabButtons = document.querySelectorAll('.tab-btn');
    const quoteItems = document.querySelectorAll('.quote-item');
    
    if (tabButtons.length > 0 && quoteItems.length > 0) {
        let currentQuoteIndex = 0;
        const quoteCount = quoteItems.length;
        let quoteTimer;
        const quoteInterval = 5000; // 5 saniye
        
        function showQuote(index) {
            // Aktif quote'u güncelle
            quoteItems.forEach(item => item.classList.remove('active'));
            quoteItems[index].classList.add('active');
            
            // Aktif tab'ı güncelle
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabButtons[index].classList.add('active');
            
            currentQuoteIndex = index;
        }
        
        function nextQuote() {
            showQuote((currentQuoteIndex + 1) % quoteCount);
        }
        
        function startAutoQuote() {
            stopAutoQuote();
            quoteTimer = setInterval(nextQuote, quoteInterval);
        }
        
        function stopAutoQuote() {
            if (quoteTimer) {
                clearInterval(quoteTimer);
            }
        }
        
        // Otomatik alıntı geçişini başlat
        startAutoQuote();
        
        // Tab butonları için event listener'lar
        tabButtons.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                showQuote(index);
                stopAutoQuote();
                startAutoQuote(); // Tıklandıktan sonra otomatik geçişi yeniden başlat
            });
        });
        
        // Fare alıntı bölümü üzerine geldiğinde otomatik geçişi durdur
        const quoteContainer = document.querySelector('.quote-container');
        if (quoteContainer) {
            quoteContainer.addEventListener('mouseenter', stopAutoQuote);
            quoteContainer.addEventListener('mouseleave', startAutoQuote);
        }
    }
    
    // --------- Scroll to Top işlevi ---------
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    
    if (scrollToTopBtn) {
        // Sayfa kaydırıldığında butonu göster/gizle
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        // Butona tıklandığında yukarı kaydır
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});