# GYMD Yayınları - Kurulum Talimatları

## Gereksinimler

- PHP 8.2 veya üzeri
- Composer
- SQLite (varsayılan) veya MySQL/PostgreSQL

## Kurulum Adımları

### 1. Bağımlılıkları Yükleyin
```bash
composer install
```

### 2. .env Dosyasını Oluşturun
```bash
cp .env.example .env
```

### 3. Uygulama Anahtarını Oluşturun
```bash
php artisan key:generate
```

### 4. Veritabanını Hazırlayın
```bash
php artisan migrate
```

### 5. Storage Linkini Oluşturun
```bash
php artisan storage:link
```

### 6. Sunucuyu Başlatın
```bash
php artisan serve
```

## Yapılan Değişiklikler

### Ana Sayfa (index.blade.php)
- Slider verileri artık veritabanından dinamik olarak çekiliyor
- Günün hadisi ve ayeti veritabanından rastgele seçiliyor
- Öne çıkan kitaplar ve jurnallar son eklenen 4 tanesi gösteriliyor

### Kitaplar Sayfası (kitablar.blade.php)
- Tüm kitaplar veritabanından dinamik olarak çekiliyor
- Kitap kapakları, başlıkları ve yazarları gösteriliyor
- Kitap yoksa uygun mesaj gösteriliyor

### Jurnallar Sayfası (jurnallar.blade.php)
- Tüm jurnallar veritabanından dinamik olarak çekiliyor
- Jurnal kapakları ve başlıkları gösteriliyor
- Jurnal yoksa varsayılan jurnallar gösteriliyor

### Yeni Controller'lar
- `HomeController`: Ana sayfa için
- `BookController`: Kitaplar sayfası için
- `JournalController`: Jurnallar sayfası için

### Route Güncellemeleri
- Ana sayfa, kitaplar ve jurnallar sayfaları artık controller'lar kullanıyor
- Dinamik veri çekme aktif

## Admin Panel

Admin panelden eklediğiniz:
- Kitaplar artık ana sayfada ve kitaplar sayfasında görünecek
- Jurnallar ana sayfada ve jurnallar sayfasında görünecek
- Slider'lar ana sayfada görünecek
- Hadisler ve ayetler ana sayfada rastgele gösterilecek

## Sorun Giderme

### Resimler Görünmüyorsa
1. `php artisan storage:link` komutunu çalıştırın
2. `public/storage` klasörünün `storage/app/public` klasörüne linklendiğini kontrol edin

### Veritabanı Hatası
1. `.env` dosyasında veritabanı ayarlarını kontrol edin
2. `php artisan migrate` komutunu çalıştırın

### Sayfa Yüklenmiyor
1. `php artisan serve` komutunu çalıştırın
2. Tarayıcıda `http://localhost:8000` adresine gidin 