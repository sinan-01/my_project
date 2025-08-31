<!-- ========= All Javascript files linkup ======== -->
<!-- JS dosyaları asset() ile çağrıldı, doğru kullanım -->
<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

<!-- Mobil Menu JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-sidebar-close');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.overlay');
    
    // Burger menu açma
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }
    
    // Sidebar kapatma
    function closeSidebar() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Kapat butonu
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeSidebar);
    }
    
    // Overlay'e tıklayınca kapat
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
    
    // Menü linklerine tıklayınca kapat (mobilde)
    if (window.innerWidth <= 767) {
        const navLinks = document.querySelectorAll('.sidebar-nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', closeSidebar);
        });
    }
    
    // Ekran boyutu değiştiğinde kontrol et
    window.addEventListener('resize', function() {
        if (window.innerWidth > 767) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});
</script>

<!-- Modern Form JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload improvements
    const fileInputs = document.querySelectorAll('.modern-file-input');
    
    fileInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const fileName = this.files[0] ? this.files[0].name : '';
            
            if (fileName) {
                const icon = label.querySelector('i');
                const span = label.querySelector('span');
                const small = label.querySelector('small');
                
                // Update label content
                span.textContent = fileName;
                small.textContent = 'Dosya seçildi - Değiştirmek için tekrar tıklayın';
                
                // Update styling
                label.style.borderColor = '#667eea';
                label.style.backgroundColor = '#f0f4ff';
                icon.style.color = '#667eea';
            }
        });
    });
    
            // Form validation improvements
    const forms = document.querySelectorAll('.modern-form');
    
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            
            if (submitBtn) {
                // Add loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="lni lni-spinner-arrow"></i> Yükleniyor...';
                submitBtn.disabled = true;
                
                // Re-enable button after 10 seconds as fallback
                setTimeout(function() {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 10000);
            }
        });
    });
    
    // Auto-resize textareas
    const textareas = document.querySelectorAll('.modern-textarea');
    textareas.forEach(function(textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
    
    // Enhanced focus states
    const inputs = document.querySelectorAll('.modern-input, .modern-textarea');
    inputs.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>

{{-- Eğer ek bir özel JS dosyanız varsa, aşağıya ekleyebilirsiniz --}}
{{-- <script src="{{ asset('asset/js/ozel.js') }}"></script> --}}